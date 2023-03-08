<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

abstract class AbstractItem
{
    private ?string $title; 
    private ?string $image; 
    private ?string $gender;
    private ?int $condition; 
    private ?string $brand;

    protected function __construct()
    {
        $this->title = null;
        $this->image = null;
        $this->gender = null;
        $this->condition = null;
        $this->brand = null;
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

    public function setImage(string $image): void
    {
        if (strlen($title) > 255){
            throw new Exception('Image file name is too long, must be max. 255 characters');
        }
        else {
            $this->image = $image;
        }
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        if (!in_array(strtoupper($gender), ['MALE', 'FEMALE', 'UNISEX'])){
            throw new Exception('Gender must be male, female or unisex');
        }
        else {
            $this->gender = $gender;
        }
    }

    public function getCondition(): ?int
    {
        return $this->condition;
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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        if (strlen($brand) > 100){
            throw new Exception('Brand must be max. 100 characters');
        }
        else {
            $this->brand = $brand;
        }
        
    }

    abstract public function getType();

    abstract public function setType($type): void;

    abstract public function getSize();

    abstract public function setSize($size): void;

}