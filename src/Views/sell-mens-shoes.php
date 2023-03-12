<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\MensShoeForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\Products\MensShoe;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    FormProcessing::sellItem(new MensShoe(), $_POST, 3);
//    header('Location: index.php');
}

echo Header::generate();
?>
    <h1>Create Men's Shoes Listing</h1>

    <?php echo MensShoeForm::generate(); ?>
    <?php echo Footer::generate(); ?>