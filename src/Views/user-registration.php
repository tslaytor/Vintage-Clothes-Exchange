<?php

use App\Controllers\FormProcessing;
use App\Models\Forms\RegisterForm;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {
        $reponse = FormProcessing::registerUser($_POST['username'], $_POST['password'], $_POST['password-confirmation']);
    } catch (Exception $e){
        print 'ERROR: ' . $e->getMessage() . PHP_EOL;
    }
    if ($reponse){
        FormProcessing::loginuser($_POST['username'], $_POST['password']);
    }
}
?>

<html>
    <head>

    </head>
    <body>
        <div class="notSignedIn">
            <?php echo RegisterForm::generate(); ?>
        </div>
    </body>
</html>