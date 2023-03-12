<?php

namespace App\Models\Products;

use Exception;

abstract class AbstractTrouser extends AbstractItem
{
    private int $type;

    protected function __construct()
    {
        parent::__construct();

        $this->setType(2);
    }

    public function setType($type): void
    {

        if ($type != 2){
            throw new Exception("Trouser type property must be int 2");
        }
        $this->type = $type;
    }

    public function getType(): string
    {
        // TODO - Look up type from type table
        return $this->type;
    }
}