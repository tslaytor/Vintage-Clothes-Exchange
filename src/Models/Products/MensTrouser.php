<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

class MensTrouser extends AbstractTrouser
{
    private ?string $size;

    public function __construct($gender = 'Mens')
    {
        parent::__construct();

        $this->setGender($gender);
        $this->size = null;
    }

    public function setSize($size): void
    {
//        if (!is_array($size) || count($size) != 2 ){
//            throw new Exception('Mens trouser size must be an array of length 2');
//        }
//        foreach ($size as $value){
//            if (!is_string($value)){
//                throw new Exception('The type values for mens trouser size must be string');
//            }
//        }
        $this->size = $size;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getTable(): string
    {
        return 'mens_trousers';
    }

}