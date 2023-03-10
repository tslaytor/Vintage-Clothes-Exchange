<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\Connection;
use App\Controllers\FormProcessing;
use \Exception as Exception;
use Symfony\Component\VarDumper\VarDumper;

abstract class AbstractItem
{
    private ?int $id;
    private ?int $sellerId;
    private ?string $title;
    private ?string $image; 
    private ?string $gender;
    private ?int $condition; 
    private ?float $price;

    protected function __construct()
    {
        $this->id = null;
        $this->sellerId = null;
        $this->title = null;
        $this->image = null;
        $this->gender = null;
        $this->condition = null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setSellerId($sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function getSeller(): string
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT username FROM users WHERE id = :id");
        $statement->execute(['id' => $this->getSellerId()]);
        return $statement->fetchColumn();

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

    public function getCondition(): ?string
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
//            return 'Brand New!!';
//        }
    }

    public function setCondition(int $condition): void
    {
        if ($condition < 0 || $condition > 3) {
            throw new Exception("Condition must be 1, 2, 3, or 4");
        }
        else {
            $this->condition = $condition;
        }
    }

    public function getConditionText(): string
    {
       $condition = $this->getCondition();
       if ($condition == 0){
            return 'OK';
        }
        else if ($condition == 1){
            return 'Good';
        }
        else if ($condition == 2){
            return 'Excellent';
        }
        else {
            return 'Brand New!!';
        }
    }

    public function setPrice(float|int $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): string
    {
        return number_format($this->price, 2);
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

    public function getTypeName(): string
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT type_name FROM types WHERE id = :id");
        $statement->execute(['id' => $this->getType()]);
        return $statement->fetchColumn();

    }

    abstract public function getType();

    abstract public function setType($type): void;

    abstract public function getSize();

    abstract public function setSize($size): void;

    abstract public function getTable(): string;

}