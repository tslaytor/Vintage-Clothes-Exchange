<?php

namespace App\Models\PageElements\HeadersAndFooters;

use App\Models\User\User;

class Header
{
    public static function generate(): string
    {
        if (isset($_SESSION['USER'])) $username = ': ' . ucfirst($_SESSION['USER']->getUsername());
        else $username = ': you are not logged in';
        return <<<EOF
            <html lang="en">
                <head>
                    <title>User Registration</title>
                    <link href="styles/styles.css" rel="stylesheet">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
                </head>
                <body>
                    <header>
                        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
                            <div class="container-fluid">
                                <a class="navbar-brand">Vintage Clothes Exchange</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarText">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="index.php">Buy Clothes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sell Clothes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="account.php">Account $username</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>
            EOF;
    }
}