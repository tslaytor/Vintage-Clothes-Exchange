<?php
namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\FormProcessing;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\PageElements\HeadersAndFooters\Footer;
use App\Models\PageElements\HeadersAndFooters\Header;
use App\Models\PageElements\Forms\LoginForm;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    FormProcessing::loginHandler($_POST['username'], $_POST['password']);
}

echo Header::generate();
?>
    <a href="javascript:history.back()">Back</a>
    <h1>Login</h1>
    <h2>Enter you username and password below</h2>
    <?php

echo LoginForm::generate();

echo Footer::generate();
?>