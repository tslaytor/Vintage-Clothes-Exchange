<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\SellClothesForm;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use Symfony\Component\VarDumper\VarDumper;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::userRegistrationHandler($_POST['username']);
    header('Location: index.php');
}

echo Header::generate();
?>
<h1>Sell your clothes here!</h1>
    <?php echo SellClothesForm::generate(); ?>
<?php echo Footer::generate(); ?>
