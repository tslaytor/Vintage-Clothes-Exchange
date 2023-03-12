<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\MensTopForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\Products\MensTop;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellItem(new MensTop('Unisex'), $_POST, 0);
//    header('Location: index.php');
}

echo Header::generate();
?>
    <h1>Create Unisex T-Shirt Listing</h1>

    <?php echo MensTopForm::generate(); ?>
    <?php echo Footer::generate(); ?>