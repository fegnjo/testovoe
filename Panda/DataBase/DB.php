<?php

class DB {

    private static $pdo;

    public function __construct($host, $user, $pass)
    {
        self::$pdo = new PDO($host, $user, $pass);
    }

    public static function checkUser($login)
    {
        return self::$pdo->query("SELECT * FROM `users` WHERE `login` = '$login'");
    }

    public static function addToDataBase($login, $password)
    {
        $password =  self::getHash($password);
        return self::$pdo->exec("INSERT INTO `users` (`login`, `password`) VALUES('$login', '$password')");
    }

    public static function getHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
