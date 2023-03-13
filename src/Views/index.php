<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\PageElements\OtherElements\Header;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\OtherElements\ProductTile;
use App\Models\PageElements\Forms\FilterForm;
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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $function = $_POST['function'];
    $products = Lister::$function();
}
?>
<div>
    <ul class="browse-by-type">
        <li><?php echo FilterForm::generate('all', 'All') ?></li>
        <li><?php echo FilterForm::generate('mensTshirts', 'Mens Tshirts') ?></li>
        <li><?php echo FilterForm::generate('mensJumpers', 'Mens Jumpers') ?></li>
        <li><?php echo FilterForm::generate('mensTrousers', 'Mens Trousers') ?></li>
        <li><?php echo FilterForm::generate('mensShoes', 'Mens Shoes') ?></li>
        <li><?php echo FilterForm::generate('womensTshirts', 'Womens Tshirts') ?></li>
        <li><?php echo FilterForm::generate('womensJumpers', 'Womens Jumpers') ?></li>
        <li><?php echo FilterForm::generate('womensTrousers', 'Womens Trousers') ?></li>
        <li><?php echo FilterForm::generate('womensShoes', 'Womens Shoes') ?></li>
        <li><?php echo FilterForm::generate('unisexTshirts', 'Unisex Tshirts') ?></li>
        <li><?php echo FilterForm::generate('unisexJumpers', 'Unisex Jumpers') ?></li>
        <li><?php echo FilterForm::generate('unisexTrousers', 'Unisex Trousers') ?></li>
        <li><?php echo FilterForm::generate('unisexShoes', 'Unisex Shoes') ?></li>

<!--        <li><a style="color: #a31b1b" href="index.php">All</a></li>-->
<!--        <li><a href="mens-tshirts.php">Mens Tshirts</a></li>-->
<!--        <li><a href="mens-jumpers.php">Mens Jumpers</a></li>-->
<!--        <li><a href="mens-trousers.php">Mens Trousers</a></li>-->
<!--        <li><a href="mens-shoes.php">Mens Shoes</a></li>-->
<!--        <li><a href="womens-tshirts.php">Womens Tshirts</a></li>-->
<!--        <li><a href="womens-jumpers.php">Womens Jumpers</a></li>-->
<!--        <li><a href="womens-trousers.php">Womens Trousers</a></li>-->
<!--        <li><a href="womens-shoes.php">Womens Shoes</a></li>-->
<!--        <li><a href="unisex-tshirts.php">Unisex Tshirts</a></li>-->
<!--        <li><a href="unisex-jumpers.php">Unisex Jumpers</a></li>-->
<!--        <li><a href="unisex-trousers.php">Unisex Trousers</a></li>-->
<!--        <li><a href="unisex-shoes.php">Unisex Shoes</a></li>-->
    </ul>
</div>
<div class="grid-container">

<?php foreach ($products as $product) {
   echo ProductTile::generate($product);
}?>

</div>

<?php echo Footer::generate();?>;
