<?php

namespace App\Models\Products;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;

class MensTop extends AbstractTop
{
    private ?string $size;

    /**
     * @throws Exception
     */
    public function __construct($gender = 'Mens')
    {
        parent::__construct();

        $this->size = null;
        $this->setGender($gender);
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize($size): void
    {
        $size = strtoupper($size);
        if (!in_array($size, ['XS', 'S', 'M', 'L', 'XL'])) {
            throw new Exception('Invalid size - men\'s top size must be XS, S, M, L, or XL');
        }
        else {
            $this->size = $size;
        }
    }

    public function getTable(): string
    {
        return 'mens_top';
    }
}
