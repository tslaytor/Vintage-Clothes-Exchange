<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Controllers\Lister;
use App\Models\Products\MensShoe;
use App\Models\Products\MensTop;
use App\Models\Products\WomensTop;
use App\Models\Products\WomensTrouser;
use Exception;
use Symfony\Component\VarDumper\VarDumper;

session_start();

echo Header::generate();

$products = Lister::all();
echo "here is the returned array";
VarDumper::dump($products);
echo "here is each element in the returned array";
foreach ($products as $product){
    VarDumper::dump($product);
}



echo Footer::generate();
