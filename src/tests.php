<?php

use App\Controllers\FormProcessing;

FormProcessing::sellTop(\App\Models\Products\MensTop::class, $_POST, 0);
FormProcessing::sellTop(\App\Models\Products\MensTop::class, $_POST, 1);
FormProcessing::sellMensTrousers($_POST);

FormProcessing::sellTop(\App\Models\Products\WomensTop::class, $_POST, 0);
FormProcessing::sellTop(\App\Models\Products\WomensTop::class, $_POST, 1);
FormProcessing::sellWomensTrousers($_POST);
