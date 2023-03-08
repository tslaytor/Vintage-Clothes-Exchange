<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\AbstractTop;

class MensTop extends AbstractTop
{
    private ?string $size;

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
        if (!in_array(strtoupper($size), ['XS', 'S', 'M', 'L', 'XL'])) {
            throw new Exception('Invalid size - men\'s top size must be XS, S, M, L, or XL');
        }
        else {
            $this->size = $size;
        }
    }
}
