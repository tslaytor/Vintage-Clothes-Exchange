<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\Products\MensShoe;
use App\Models\Products\MensTop;
use App\Models\Products\WomensTop;
use App\Models\Products\WomensTrouser;
use Exception;
use Symfony\Component\VarDumper\VarDumper;

session_start();

echo Header::generate();

$manShirt = new MensTop();
$womanShirt = new WomensTop();

//VarDumper::dump($manShirt);
//VarDumper::dump($womanShirt);

$manShirt->setTitle('Plain White T-Shirt');
print $manShirt->getTitle() . PHP_EOL;
try{
    $manShirt->setGender('Mens');
}
catch (Exception $e){
    print "ERROR: " . $e->getMessage() . PHP_EOL;
}

print $manShirt->getGender() . PHP_EOL;
$manShirt->setCondition(4);
print $manShirt->getCondition() . PHP_EOL;
//$manShirt->setBrand('Ben Sherman');
//print $manShirt->getBrand() . PHP_EOL;
$manShirt->setType(0);
print $manShirt->getType() . PHP_EOL;
$manShirt->setSize('m');
print $manShirt->getSize() . PHP_EOL;

$manShirt->setImage('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.indiamart.com%2Fproddetail%2Fmen-white-plain-t-shirt-18489950533.html&psig=AOvVaw2GG3izkgqlAzOTNi8Tdfp6&ust=1678388814269000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCLDXst6Dzf0CFQAAAAAdAAAAABAJ');

//VarDumper::dump($manShirt);


$womanShirt->setTitle('Black Gucci Jumper');
print $womanShirt->getTitle() . PHP_EOL;
//$womanShirt->setGender('Female');
//print $womanShirt->getGender() . PHP_EOL;
$womanShirt->setCondition(1);
print $womanShirt->getCondition() . PHP_EOL;
//$womanShirt->setBrand('Gucci');
//print $womanShirt->getBrand() . PHP_EOL;
$womanShirt->setType(1);
print $womanShirt->getType() . PHP_EOL;
$womanShirt->setSize(12);
print $womanShirt->getSize() . PHP_EOL;

//VarDumper::dump($womanShirt);

//$manTrouser = new MensTrouser();
//VarDumper::dump($manTrouser);

$mShoe = new MensShoe();
VarDumper::dump($mShoe);

$wT = new WomensTrouser();
VarDumper::dump($wT);

VarDumper::dump($_SESSION);


