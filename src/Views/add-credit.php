<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\OtherElements\Header;
use App\Models\PageElements\Forms\CreditForm;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::addCredit($_SESSION['USER'], $_POST['amount']);
    header('Location: account.php');
}

echo Header::generate();

if (!isset($_SESSION['USER'])): ?>
<h1>You must login to use this service</h1>
<?php else : ?>
<a href="javascript:history.back()">Back</a>
<h1>Add Credit</h1>
    <h2>How much credit do you want to add to your account?</h2>
    <?php echo CreditForm::generate();
endif;

echo Footer::generate();
?>