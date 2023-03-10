<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

session_start();
?>
<html lang="en">
    <head>
        <title>Account</title>
        <link href="styles/styles.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Vintage Clothes Exchange</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                    <span class="navbar-text"><a href="account.php">Account</a></span>
                </div>
            </div>
        </nav>
    </header>
    <h1>Welcome to the Account page, y'all</h1>
    <?php
        VarDumper::dump($_SESSION);


    ?>

    <?php if (!isset($_SESSION['USER'])): ?>
        <a href="user-registration.php">Create an Account</a>
    <?php else : ?>
        <?php $user = $_SESSION['USER'] ?>
        <div>Hello, <?php echo $user->getUsername(); ?></div>
        <div>Your account balance is: <?php echo $user->getCredit() ?></div>
        <div><a href="add-credit.php">Add credit</a></div>
    <?php endif; ?>

    </body>
</html>
