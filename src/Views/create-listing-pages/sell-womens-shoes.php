<?php

namespace App\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\WomensShoeForm;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\OtherElements\Header;
use App\Models\Products\WomensShoe;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    FormProcessing::sellItem(new WomensShoe(), $_POST, 3);
    header('Location: ../index.php');
}

echo Header::generate();
?>
    <h1>Create Women's Shoes Listing</h1>

    <?php if (!isset($_SESSION['USER'])) :?>
    <h3 style="color: #a31b1b">You must be logged in to list an item for sale</h3>
<?php endif ?>

    <?php echo WomensShoeForm::generate(); ?>
    <?php echo Footer::generate(); ?>