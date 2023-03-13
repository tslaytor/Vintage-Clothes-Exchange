<?php

namespace App\Views;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\PageElements\OtherElements\Header;
use App\Models\PageElements\OtherElements\Footer;


session_start();

echo Header::generate();




echo Footer::generate();?>;
