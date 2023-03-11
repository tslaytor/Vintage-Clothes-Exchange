<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

abstract class AbstractTop extends AbstractItem
{
    private ?int $type;

    protected function __construct()
    {
        parent::__construct();

        $this->type = null;
    }

    public function getType(): ?string
    {
        return $this->type;
//        if ($this->type === 0) {
//            return 'T-Shirt';
//        }
//        else if ($this->type === 1)
//        {
//            return 'Jumper';
//        }
//        else
//        {
//            throw new Exception("The top type saved is not valid, must be int 1 or 2");
//        }
        
    }

    public function setType($type): void
    {
        if (!in_array($type, [0, 1])){
            throw new Exception("Top type must be t-shirt [0] or jumper [1]");
        }
        else {
            $this->type = $type;
        }   
    }
    abstract public function getTable(): string;
}
