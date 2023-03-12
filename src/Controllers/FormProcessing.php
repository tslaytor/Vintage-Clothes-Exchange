<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Products\AbstractItem;
use App\Models\Products\MensTop;
use App\Models\Products\MensTrouser;
use App\Models\Products\WomensTop;
use App\Models\Products\WomensTrouser;
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

    public static function sellTop($className, $post, $type)
    {
        VarDumper::dump($post);

        $tshirt = new $className();

        VarDumper::dump($tshirt);

        $tshirt->setSellerId($_SESSION['USER']->getId());
        $tshirt->setTitle($post['title']);
        $tshirt->setImage($post['image']);
        $tshirt->setSize($post['size']);
        $tshirt->setCondition($post['condition']);
        $tshirt->setPrice($post['price']);
        $tshirt->setType($type);


        VarDumper::dump($tshirt);

        $tshirt->save();

    }

    public static function sellMensTrousers($post)
    {
        VarDumper::dump($post);

        VarDumper::dump(['waist' => intval($post['waist']), 'leg' => intval($post['leg'])]);

        $trouser = new MensTrouser();

        VarDumper::dump($trouser);

        $trouser->setSellerId($_SESSION['USER']->getId());
        $trouser->setTitle($post['title']);
        $trouser->setImage($post['image']);
        $trouser->setSize(['waist' => intval($post['waist']), 'leg' => intval($post['leg'])]);
        $trouser->setCondition($post['condition']);
        $trouser->setPrice($post['price']);
        $trouser->setType(2);


        VarDumper::dump($trouser);

        $trouser->save();

    }

    public static function sellWomensTrousers($post)
    {
        VarDumper::dump($post);

        $trouser = new WomensTrouser();

        VarDumper::dump($trouser);

        $trouser->setSellerId($_SESSION['USER']->getId());
        $trouser->setTitle($post['title']);
        $trouser->setImage($post['image']);
        $trouser->setSize(intval($post['size']));
        $trouser->setCondition($post['condition']);
        $trouser->setPrice($post['price']);
        $trouser->setType(2);


        VarDumper::dump($trouser);

        $trouser->save();

    }

    public static function save(AbstractItem $object): void
    {
        if (is_array($object->getSize())){
            $size = json_encode($object->getSize());
        }
        else {
            $size = $object->getSize();
        }
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("INSERT INTO " . $object->getTable() .
        " (seller, title, image, gender, item_condition, price, size, type)
        VALUES (:seller, :title, :image, :gender, :item_condition, :price, :size, :type)");

        $statement->execute([
            'seller' => $object->getSellerId(),
            'title' => $object->getTitle(),
            'image' => $object->getImage(),
            'gender' => $object->getGender(),
            'item_condition' => $object->getCondition(),
            'price' => $object->getPrice(),
            'size' => $size,
            'type' => $object->getType()
        ]);


    }
}