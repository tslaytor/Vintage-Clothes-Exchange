<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use App\Models\PageElements\Forms\RegisterForm;
use App\Models\PageElements\OtherElements\Footer;
use App\Models\PageElements\OtherElements\Header;
use Symfony\Component\VarDumper\VarDumper;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::userRegistrationHandler($_POST['username']);
    header('Location: index.php');
}

echo Header::generate();
?>
<h1>Create an Account</h1>
<div class="notSignedIn">
    <?php echo RegisterForm::generate(); ?>
</div>
<?php echo Footer::generate(); ?>