<?php

namespace App\Models\User;

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\Connection;
use PDO;
use Symfony\Component\VarDumper\VarDumper;

class User
{
    private ?int $id;
    private ?string $username;
    private ?string $password;
    private float $credit;

    public function __construct($id = null, $username = null, $password = null, $credit = 0)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->credit = $credit;
    }

    public function  getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setCredit(float $credit): void
    {
        $this->credit = $credit;
    }

    public function getCredit(): float
    {
        return $this->credit;
    }

    public function save(): void
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $statement->execute(['username' => $this->getUsername(), 'password' => $this->getPassword()]);
    }

    public function findUserInDatabase(): User|bool
    {
        $pdo = Connection::getInstance()->getPdo();
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        print "username is: " . $this->getUsername();
        $statement->execute(['username' => $this->getUsername()]);
        $row = $statement->fetch(PDO::FETCH_OBJ);
        if (!$row){
            return false;
        }
        return new User($row->id, $row->username, $row->password, $row->credit);
    }

}