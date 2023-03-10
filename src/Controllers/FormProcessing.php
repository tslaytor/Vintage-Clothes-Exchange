<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User\User;
use Exception;
use PDO;

class FormProcessing
{
    public static function userRegistrationHandler(string $username): void
    {
        $user = new User();
        $user->setUsername($username);

        try {
            if (self::registerUser($user, $_POST['password'], $_POST['confirmPassword'])){
//              $userData = $user->findUserInDatabase();
//              $user->setCredit($userData['credit']);
                $_SESSION['USER'] = $user->findUserInDatabase();
            }
        } catch (Exception $e){
            print 'ERROR: ' . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * @throws Exception
     */
    public static function registerUser(User $user, string $password, string $confirmPassword): bool
    {
        if ($user->findUserInDatabase()){
            throw new Exception("Username already taken");
        }
        if ($password !== $confirmPassword){
            throw new Exception('Passwords must match');
        }
        $user->setPassword($password);
        $user->save();
        return true;
    }

    public static function addCredit(User $user, int $amount): void
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT credit FROM users WHERE id = :id");
        $statement->execute(['id' => $user->getId()]);
        $currentAmount = $statement->fetchColumn();
        $newAmount = $currentAmount + $amount;
        $statement = $pdo->prepare("UPDATE users SET credit = :newAmount WHERE id = :id");
        $statement->execute(['newAmount' => $newAmount, 'id' => $user->getId()]);
        $_SESSION['USER'] = $user->findUserInDatabase();
    }
}