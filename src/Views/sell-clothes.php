<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\MensTopForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use Symfony\Component\VarDumper\VarDumper;

session_start();

//if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//    FormProcessing::sellClothes($_POST);
////    header('Location: index.php');
//}

echo Header::generate();
?>
<h1>What kind of clothing item do you want to sell?</h1>
<ul>
    <a href="create-listing-pages/sell-mens-tshirt.php"><li>Men's T-shirt</li></a>
    <a href="create-listing-pages/sell-mens-jumper.php"><li>Men's Jumper</li></a>
    <a href="create-listing-pages/sell-mens-trousers.php"><li>Men's Trousers</li></a>
    <a href="create-listing-pages/sell-mens-shoes.php"><li>Men's Shoes</li></a>
    <a href="create-listing-pages/sell-womens-tshirt.php"><li>Women's T-shirt</li></a>
    <a href="create-listing-pages/sell-womens-jumper.php"><li>Women's Jumper</li></a>
    <a href="create-listing-pages/sell-womens-trousers.php"><li>Women's Trousers</li></a>
    <a href="create-listing-pages/sell-womens-shoes.php"><li>Women's Shoes</li></a>
    <a href="create-listing-pages/sell-unisex-tshirt.php"><li>Unisex T-shirt</li></a>
    <a href="create-listing-pages/sell-unisex-jumper.php"><li>Unisex Jumper</li></a>
    <a href="create-listing-pages/sell-unisex-trousers.php"><li>Unisex Trousers</li></a>
    <a href="create-listing-pages/sell-unisex-shoes.php"><li>Unisex Shoes</li></a>
</ul>

<?php echo Footer::generate(); ?>
