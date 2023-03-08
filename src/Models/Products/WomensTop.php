<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Products\AbstractTop;

class WomensTop extends AbstractTop
{
    private ?int $size;

    public function __construct()
    {
        parent::__construct();

        $this->size = null;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize($size): void
    {
        if ($size < 4 || $size > 18) {
            throw new Exception('Invalid size - women\'s top size must be in the range of 4 to 18');
        }
        else {
            $this->size = $size;
        }
    }
}