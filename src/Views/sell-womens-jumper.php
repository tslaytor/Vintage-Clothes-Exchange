<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\WomensTopForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\Products\WomensTop;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellItem(new WomensTop, $_POST, 1);
//    header('Location: index.php');
}

echo Header::generate();
?>
    <h1>Create Women's Jumper Listing</h1>

    <?php echo WomensTopForm::generate(); ?>
    <?php echo Footer::generate(); ?>