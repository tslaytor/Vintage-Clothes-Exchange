<?php

namespace App\Models\Products;

use Exception;

class WomensShoe extends AbstractShoe
{

    public function __construct()
    {
        parent::__construct();
        try {
            $this->setType('Shoe');
        }
        catch (Exception $e){
            print "ERROR: setting type for Shoe in constructor. Message: " . $e->getMessage();
        }
        $this->size = null;
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
        if ($frac_part == 0 || $frac_part == 0.5 && $size >= 2 && $size <= 9) {
            $this->size = $size;
        }
        else{
            throw new Exception(
                "Error: Setting Womens shoe size. Must be a whole int or half float (ending in .5)  and in range of 2 to 9"
            );
        }
    }
}