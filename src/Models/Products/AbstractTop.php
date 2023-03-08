<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Products\AbstractItem;

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
        if ($this->type === 0) {
            return 'T-Shirt';
        }
        else {
            return 'Jumper';
        }
        
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
}
