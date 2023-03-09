<?php

namespace App\Models\Products;

use Exception;

class MensShoe extends AbstractItem
{
    private string $type;
    private float $size;

    public function __construct()
    {
        parent::__construct();
        try {
            $this->setType('Shoe');
        }
        catch (Exception $e){
            print "ERROR: setting type for shoe in shoe constructor. Message: " . $e->getMessage();
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @throws Exception
     */
    public function setType($type): void
    {
        if (!is_string($type)){
            throw new Exception("Shoe type property must be a string");
        }
        $type = ucfirst(strtolower($type));
        if ($type !== 'Shoe'){
            throw new Exception("Shoes type property must be 'Shoe'");
        }

    }

    public function getSize()
    {
        return $this->size;
    }

    /**
     * @throws Exception
     */
    public function setSize($size): void
    {
        if (!is_numeric($size)) {
            throw new Exception("Mens shoe size must be a number");
        }
        $int_part = floor($size);
        $frac_part = $size - $int_part;
        if ($frac_part == 0 || $frac_part == 0.5 && $size >= 3 && $size <= 14) {
            $this->size = $size;
        }
        else{
            throw new Exception(
                "Error: Setting Mens shoe size. Must be a whole int or half float (ending in .5)  and in range of 3 to 14"
            );
        }
    }
}