<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\PageElements\OtherElements\Header;
use App\Models\PageElements\Forms\LogoutForm;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::logoutHandler();
}

echo Header::generate();
?>
    <h1>Account Page</h1>

    <?php if (!isset($_SESSION['USER'])): ?>
    <div class="out-account">
        <div><a href="user-login.php">Login</a></div>
        <div><a href="user-registration.php">Create an Account</a></div>
    </div>

    <?php else : ?>
        <?php $user = $_SESSION['USER'] ?>
        <div class="greeting">Hello, <?php echo $user->getUsername(); ?></div>
        <div class="credit">Your account balance is: £<?php echo $user->getCredit() ?></div>
        <div class="add-credit"><a href="add-credit.php">Add credit</a></div>
        <?php echo LogoutForm::generate(); ?>
    <?php endif; ?>

    </body>
</html>
