<?php

namespace App\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\MensTrousersForm;
use App\Models\PageElements\Forms\MensTopForm;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\OtherElements\Header;
use App\Models\Products\MensTrouser;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::sellItem(new MensTrouser('Unisex'), $_POST, 2);
    header('Location: ../index.php');
}

echo Header::generate();
?>
    <h1>Create Unisex Trousers Listing</h1>

    <?php if (!isset($_SESSION['USER'])) :?>
    <h3 style="color: #a31b1b">You must be logged in to list an item for sale</h3>
<?php endif ?>

    <?php echo MensTrousersForm::generate(); ?>
    <?php echo Footer::generate(); ?>