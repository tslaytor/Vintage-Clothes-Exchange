<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\AbstractItem;

abstract class AbstractTop extends AbstractItem
{
    private ?string $type;

    protected function __construct()
    {
        parent::__construct();

        $this->type = null;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }
}
