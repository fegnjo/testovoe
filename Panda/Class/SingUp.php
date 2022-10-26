<?php
require_once '../DataBase/dbConnect.php';

class SingUp
{
    public $name;
    public $password;
    public $login;

    /** Получаем данные с POST запроса*/

    public function __construct($values)
    {
        if($this->check_params($values) === true)
        {
            $this->password = $values['password'];
            $this->login = $values['login'];
        }
    }

    public function sing_up()
    {
        if(DB::checkUser($this->login)->fetch())
            die($this->returnHtmlError('Такой логин уже существует'));
        else {
            return DB::addToDataBase($this->login, $this->password);
        }
    }

    /** Валидация данных */
    public function check_params($values)
    {
        if($values['login'] == '')
            die($this->returnHtmlError('Логин обязателен для заполнения'));
        elseif($values['password'] == '')
            die($this->returnHtmlError('Пароль обязателен для заполнения'));
        else
            return true;
    }

    public function returnHtmlError($error)
    {
        return '<div class="alert alert-danger">'.$error.'</div>';
    }

}