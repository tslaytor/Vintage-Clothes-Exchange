<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\Connection;
use App\Controllers\FormProcessing;
use \Exception as Exception;

abstract class AbstractItem
{
    private ?int $sellerId;
    private ?string $title;
    private ?string $image; 
    private ?string $gender;
    private ?int $condition; 
    private ?float $price;

    protected function __construct()
    {
        $this->sellerId = null;
        $this->title = null;
        $this->image = null;
        $this->gender = null;
        $this->condition = null;
    }

    public function setSellerId($sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        if (strlen($title) > 100){
            throw new Exception('Title must be max. 100 characters');
        }
        else {
            $this->title = $title;
        }
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @throws Exception
     */
    public function setImage(string $image): void
    {
        if (strlen($image) > 1000){
            throw new Exception('Image address is too long, must be max. 1000 characters');
        }
        else {
            $this->image = $image;
        }
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @throws Exception
     */
    public function setGender(string $gender): void
    {
        $gender = strtoupper($gender);
        if (!in_array($gender, ['MENS', 'WOMENS', 'UNISEX'])){
            throw new Exception('Gender must be mens, womens or unisex');
        }
        else {
            $this->gender = $gender;
        }
    }

    public function getCondition(): ?int
    {
        return $this->condition;
//        if ($this->condition === null){
//            return $this->condition;
//        }
//        else if ($this->condition == 0){
//            return 'OK';
//        }
//        else if ($this->condition == 1){
//            return 'Good';
//        }
//        else if ($this->condition == 2){
//            return 'Excellent';
//        }
//        else {
//            return 'Brand New';
//        }
    }

    public function setCondition(int $condition): void
    {
        if ($condition < 1 || $condition > 4) {
            throw new Exception("Condition must be 1, 2, 3, or 4");
        }
        else {
            $this->condition = $condition;
        }
    }

//    public function getBrand(): ?string
//    {
//        return $this->brand;
//    }
//
//    public function setBrand(string $brand): void
//    {
//        if (strlen($brand) > 100){
//            throw new Exception('Brand must be max. 100 characters');
//        }
//        else {
//            $this->brand = $brand;
//        }
//
//    }

    public function setPrice(float|int $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float|int
    {
        return $this->price;
    }

    public function save(): void
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("INSERT INTO " . $this->getTable() .
            " (seller, title, image, gender, item_condition, price, size, type)
        VALUES (:seller, :title, :image, :gender, :item_condition, :price, :size, :type)");

        $statement->execute([
            'seller' => $this->getSellerId(),
            'title' => $this->getTitle(),
            'image' => $this->getImage(),
            'gender' => $this->getGender(),
            'item_condition' => $this->getCondition(),
            'price' => $this->getPrice(),
            'size' => $this->getSize(),
            'type' => $this->getType()
        ]);

    }

    abstract public function getType();

    abstract public function setType($type): void;

    abstract public function getSize();

    abstract public function setSize($size): void;

    abstract public function getTable(): string;

}