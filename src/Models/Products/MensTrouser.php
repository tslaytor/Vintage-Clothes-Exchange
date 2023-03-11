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
        if (!is_array($size) || count($size) != 2 ){
            throw new Exception('Mens trouser size must be an array of length 2');
        }
        foreach ($size as $value){
            if (!is_int($value)){
                throw new Exception('The type values for mens trouser size must be int');
            }
        }
        $this->size = $size;
    }

    public function getSize(): array
    {
        return $this->size;
    }

    public function getTable(): string
    {
        return 'mens_trousers';
    }

}