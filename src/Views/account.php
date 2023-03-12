<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\PageElements\Forms\LogoutForm;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::logoutHandler();
}

echo Header::generate();
?>
    <h1>Account Page</h1>

    <?php if (!isset($_SESSION['USER'])): ?>
        <div><a href="user-login.php">Login</a></div>
        <div><a href="user-registration.php">Create an Account</a></div>
    <?php else : ?>
        <?php $user = $_SESSION['USER'] ?>
        <div>Hello, <?php echo $user->getUsername(); ?></div>
        <div>Your account balance is: £<?php echo $user->getCredit() ?></div>
        <div><a href="add-credit.php">Add credit</a></div>
        <?php echo LogoutForm::generate(); ?>
    <?php endif; ?>

    </body>
</html>
