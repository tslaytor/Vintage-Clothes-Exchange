<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

abstract class AbstractShoe extends AbstractItem
{

    private string $type;
    private int|float|null $size;

    public function __construct()
    {
        parent::__construct();
        try {
            $this->setType('Shoe');
        }
        catch (Exception $e){
            print "ERROR: setting type for Mens Shoe in constructor. Message: " . $e->getMessage();
        }
        $this->size = null;
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
        $this->type = $type;

    }

    public function getSize(): int|float|null
    {
        return $this->size;
    }

    abstract public function setSize($size): void;
}