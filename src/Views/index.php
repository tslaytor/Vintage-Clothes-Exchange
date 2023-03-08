<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

use App\Models\MensTop;

$manShirt = new MensTop();

VarDumper::dump($manShirt);
