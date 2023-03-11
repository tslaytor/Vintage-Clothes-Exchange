<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\MensTrousersForm;
use App\Models\PageElements\Forms\MensTopForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellMensTrousers($_POST);
//    header('Location: index.php');
}

echo Header::generate();
?>
    <h1>Create Men's Jumper Listing</h1>

    <?php echo MensTrousersForm::generate(); ?>
    <?php echo Footer::generate(); ?>