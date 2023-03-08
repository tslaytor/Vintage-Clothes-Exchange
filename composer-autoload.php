<?php

require_once 'vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;
use App\User;

//$data = [
//    'id' => 120,
//    'name' => 'Thomas'
//];

$data = new User(5, 'Dave');

VarDumper::dump($data);