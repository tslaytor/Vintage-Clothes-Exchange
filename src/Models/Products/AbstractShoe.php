<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

abstract class AbstractShoe extends AbstractItem
{

    private int $type;
    protected ?float $size;

    public function __construct()
    {
        parent::__construct();
        try {
            $this->setType(3);
        }
        catch (Exception $e){
            print "ERROR: setting type for Mens Shoe in constructor. Message: " . $e->getMessage();
        }
        $this->size = null;
    }

    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @throws Exception
     */
    public function setType($type): void
    {
        if (!is_int($type)){
            throw new Exception("Shoe type property must be an int");
        }
        if ($type !== 3){
            throw new Exception("Shoes type property must be an int of 3");
        }
        $this->type = $type;

    }

    public function getTable(): string
    {
        return 'shoes';
    }

    abstract public function setSize($size): void;

    public function getSize()
    {
        return $this->size;
    }

}