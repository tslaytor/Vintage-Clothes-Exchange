<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User\User;
use Exception;
use PDO;
use Symfony\Component\VarDumper\VarDumper;

class FormProcessing
{
    //TODO - Throw here, don't catch, and add catches to calling function
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
    //TODO - add catches to calling function
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

    //TODO - add checks, throw exceptions
    public static function addCredit(User $user, float $amount): void
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

    //TODO - Throw here, don't catch, and add catches to calling function
    public static function loginHandler($username, $password): bool
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        try {
            $statement->execute(['username' => $username, 'password' => $password]);
        } catch (Exception $e) {
            print 'Error: ' . $e->getMessage();
        }
        $row = $statement->fetch(PDO::FETCH_OBJ);
        if (!$row){
            return false;
        }
        $_SESSION['USER'] = new User($row->id, $row->username, $row->password, $row->credit);
        return true;
    }

    //TODO - add checks, throw exceptions
    public static function logoutHandler(): void
    {
        unset($_SESSION['USER']);
        print "You have been logged out";
    }
}