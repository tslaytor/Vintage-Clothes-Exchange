<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

class MensTrouser extends AbstractTrouser
{
    private ?array $size;

    public function __construct()
    {
        parent::__construct();

        $this->setGender('Mens');
        $this->size = null;
    }

    public function setSize($size): void
    {
        if (!is_array($this) || count($size) != 2 ){
            throw new Exception('Mens trouser size must be an array of length 2');
        }
        foreach ($size as $value){
            if (!is_int($value)){
                throw new Exception('The type values for mens trouser size must be int');
            }
        }
        $this->size = ['waist' => $size[0], 'leg' => $size[1]];
    }

    public function getSize(): string
    {
        return "Waist: " . $this->size['waist'] . " inches" . PHP_EOL .
                "Leg: " . $this->size['leg'] . " inches" . PHP_EOL;
    }

}