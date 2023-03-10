<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;
use App\Models\PageElements\HeadersAndFooters\Header;

session_start();

echo Header::generate();
?>
    <h1>Welcome to the Account page, y'all</h1>
    <?php
        VarDumper::dump($_SESSION);


    ?>

    <?php if (!isset($_SESSION['USER'])): ?>
        <div><a href="user-login.php">Login</a></div>
        <div><a href="user-registration.php">Create an Account</a></div>
    <?php else : ?>
        <?php $user = $_SESSION['USER'] ?>
        <div>Hello, <?php echo $user->getUsername(); ?></div>
        <div>Your account balance is: <?php echo $user->getCredit() ?></div>
        <div><a href="add-credit.php">Add credit</a></div>
    <?php endif; ?>

    </body>
</html>
