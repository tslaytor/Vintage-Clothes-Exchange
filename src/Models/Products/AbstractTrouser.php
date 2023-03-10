<?php

namespace App\Models\Products;

use Exception;

abstract class AbstractTrouser extends AbstractItem
{
    private string $type;

    protected function __construct()
    {
        parent::__construct();

        $this->setType('Trouser');
    }

    public function setType($type): void
    {
        if (!is_string($type)){
            throw new Exception("Trouser type property must be a string");
        }
        $type = ucfirst(strtolower($type));
        if ($type !== 'Trouser'){
            throw new Exception("Trouser type property must be 'Trouser'");
        }
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}