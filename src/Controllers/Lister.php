<?php

namespace App\Controllers;

use App\Models\Products\AbstractItem;
use App\Models\Products\MensTop;

class Lister
{

    public static function all(): AbstractItem
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT * FROM mens_tshirts");
        $statement->execute(['username' => $username, 'password' => $password]);

        $row = $statement->fetch(PDO::FETCH_OBJ);
        if ($row){
            new MensTop($row->id, $row->username, $row->password, $row->credit);
        }

        $_SESSION['USER'] = new User($row->id, $row->username, $row->password, $row->credit);
        return true;
    }
}