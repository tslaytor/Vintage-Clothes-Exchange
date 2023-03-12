<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\WomensTrousersForm;
use App\Models\Products\WomensTrouser;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellItem(new WomensTrouser, $_POST, 2);
//    header('Location: index.php');
}

echo Header::generate();
?>
    <h1>Create Women's Trousers Listing</h1>

    <?php echo WomensTrousersForm::generate(); ?>
    <?php echo Footer::generate(); ?>