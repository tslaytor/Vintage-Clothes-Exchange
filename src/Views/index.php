<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\PageElements\OtherElements\Header;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\Forms\FilterForm;
use App\Controllers\Lister;

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

    </ul>
</div>
<div class="grid-container">

    <?php foreach ($products as $product) :?>
       <?php $userListing = '';
            $seller = $product->getSeller();
            if (isset($_SESSION['USER'])){
                if ($product->getSellerId() === $_SESSION['USER']->getId()){
                    $userListing = 'user-listing';
                    $seller = 'You';
                }
            } ?>
            <div class="product-listing <?php echo $userListing ?>">
                <div class="listing-title"><?php echo $product->getTitle(); ?></div>
                <div class="listing-gender"><?php echo $product->getGender(); ?></div>
                <div class="image-container"><img class="listing-image" src="<?php echo $product->getImage(); ?>"></div>
                <div class="listing-condition">Type: <?php echo $product->getTypeName(); ?></div>
                <div class="listing-condition">Size: <?php echo $product->getSize(); ?></div>
                <div class="listing-condition">Condition: <?php echo $product->getConditionText(); ?></div>
                <div class="listing-price">Price: £<?php echo $product->getPrice(); ?></div>
                <div class="listing-sold-by">Sold by: <?php echo $seller; ?></div>
            </div>
    <?php endforeach; ?>
</div>

<?php echo Footer::generate();?>;
