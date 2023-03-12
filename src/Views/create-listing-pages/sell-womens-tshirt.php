<?php

namespace App\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\WomensTopForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\Products\WomensTop;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellItem(new WomensTop, $_POST, 0);
    header('Location: ../index.php');
}

echo Header::generate();
?>
    <h1>Create Women's T-Shirt Listing</h1>

    <?php if (!isset($_SESSION['USER'])) :?>
    <h3 style="color: #a31b1b">You must be logged in to list an item for sale</h3>
<?php endif ?>

    <?php echo WomensTopForm::generate(); ?>
    <?php echo Footer::generate(); ?>