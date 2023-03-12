<?php

namespace App\Controllers;

use App\Models\Products\AbstractItem;
use App\Models\Products\MensTop;
use App\Models\Products\MensTrouser;
use App\Models\Products\MensShoe;
use App\Models\Products\WomensTop;
use App\Models\Products\WomensTrouser;
use App\Models\Products\WomensShoe;
use Symfony\Component\VarDumper\VarDumper;
use PDO;

class Lister
{

    public static function all(): array
    {
        $all = [];
        $all = array_merge($all, self::mensTshirts());
        $all = array_merge($all, self::mensJumpers());
        $all = array_merge($all, self::mensTrousers());
        $all = array_merge($all, self::mensShoes());

        $all = array_merge($all, self::womensTshirts());
        $all = array_merge($all, self::womensJumpers());
        $all = array_merge($all, self::womensTrousers());
        $all = array_merge($all, self::womensShoes());

        $all = array_merge($all, self::unisexTshirts());
        $all = array_merge($all, self::unisexJumpers());
        $all = array_merge($all, self::unisexTrousers());
        $all = array_merge($all, self::unisexShoes());

        usort($all, function ($a, $b)
        {
            return $a->getId() - $b->getId();
        });

        return $all;
    }

    public static function mensTshirts(): array
    {
        return self::getProducts(new MensTop(), 0, 'Mens');
    }

    public static function mensJumpers(): array
    {
        return self::getProducts(new MensTop(), 1, 'Mens');
    }

    public static function mensTrousers(): array
    {
        return self::getProducts(new MensTrouser(), gender: 'Mens');
    }

    public static function mensShoes(): array
    {
        return self::getProducts(new MensShoe(), gender: 'Mens');
    }

    public static function womensTshirts(): array
    {
        return self::getProducts(new WomensTop(), 0);
    }

    public static function womensJumpers(): array
    {
        return self::getProducts(new WomensTop(), 1);
    }

    public static function womensTrousers(): array
    {
        return self::getProducts(new WomensTrouser());
    }

    public static function womensShoes(): array
    {
        return self::getProducts(new WomensShoe());
    }

    public static function unisexTshirts(): array
    {
        return self::getProducts(new MensTop(), 0, 'unisex');
    }

    public static function unisexJumpers(): array
    {
        return self::getProducts(new MensTop(), 1, 'unisex');
    }

    public static function unisexTrousers(): array
    {
        return self::getProducts(new MensTrouser(), gender: 'unisex');
    }

    public static function unisexShoes(): array
    {
        return self::getProducts(new MensShoe(), gender: 'unisex');
    }

    public static function getProducts(AbstractItem $productObject, $type = null, $gender = null): array
        {
            if ($type !== null){
                $productObject->setType($type);
            }
            if ($gender !== null){
                $productObject->setGender($gender);
            }
            $allItems = [];
            $pdo = Connection::getInstance()->getPdo();
            $statement = $pdo->prepare("SELECT * FROM " . $productObject->getTable() . " WHERE type = :type AND gender = :gender");
            $statement->execute(['type' => $productObject->getType(), 'gender' => $productObject->getGender()]);
            $rows = $statement->fetchAll(PDO::FETCH_OBJ);
            VarDumper::dump($rows);
            if ($rows){
                foreach ( $rows as $item) {
                    $obj = new $productObject();
                    $obj->setId($item->id);
                    $obj->setSellerId($item->seller);
                    $obj->setTitle($item->title);
                    $obj->setImage($item->image);
                    $obj->setGender($productObject->getGender());
                    $obj->setCondition($item->item_condition);
                    $obj->setPrice($item->price);

                    if ($productObject::class === "App\\Models\\Products\\MensTrouser"){
                        VarDumper::dump(json_decode($item->size, true));
                        $item->size = json_decode($item->size, true);
                    }
                    $obj->setSize($item->size);
                    $obj->setType($productObject->getType());
                    $allItems[] = $obj;
                }
            }
            return $allItems;
        }
}