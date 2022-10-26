<?php
require_once 'SingUp.php';
require_once '../DataBase/dbConnect.php';

class SingIn extends SingUp {

    public $password;
    public $hash;

    public function sing_in()
    {
        $res = DB::checkUser($this->login)->fetch();
        if(isset($res['password'])) {
            if ($this->passwordVerify($res['password']))
            {
                return $this->login;
            }else
                die($this->returnHtmlError('Пароли не совпадают'));
        }else
            die($this->returnHtmlError('Такого логина не существует'));
    }

    public function passwordVerify($hash)
    {
        if(password_verify($this->password, $hash))
            return true;
        else
            return false;
    }

}