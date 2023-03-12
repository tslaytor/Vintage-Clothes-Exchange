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
?>
<div>
    <ul class="browse-by-type">
        <li style="color: #a31b1b"><a>All</a></li>
        <li><a>Mens Tshirts</a></li>
        <li><a>Mens Jumpers</a></li>
        <li><a>Mens Trousers</a></li>
        <li><a>Mens Shoes</a></li>
        <li><a>Womens Tshirts</a></li>
        <li><a>Womens Jumpers</a></li>
        <li><a>Womens Trousers</a></li>
        <li><a>Womens Shoes</a></li>
        <li><a>Unisex Tshirts</a></li>
        <li><a>Unisex Jumpers</a></li>
        <li><a>Unisex Trousers</a></li>
        <li><a>Unisex Shoes</a></li>
    </ul>
</div>
<div class="grid-container">

<?php foreach ($products as $product) : ?>
    <div class="product-listing">
        <div class="listing-title"><?php print $product->getTitle() ?></div>
        <div class="listing-gender"><?php print $product->getGender() ?></div>
        <div class="image-container"><img class="listing-image" src="<?php echo $product->getImage() ?>"></div>
        <div class="listing-condition">Type: <?php print $product->getTypeName() ?></div>
        <div class="listing-condition">Size: <?php print $product->getSize() ?></div>
        <div class="listing-condition">Condition: <?php print $product->getConditionText() ?></div>
        <div class="listing-price">Price: £<?php echo $product->getPrice() ?></div>
        <div class="listing-sold-by">Sold by: <?php echo $product->getSeller() ?></div>
    </div>
<?php endforeach ?>

</div>

<?php echo Footer::generate();?>;
