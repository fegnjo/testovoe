<?php

class Main
{
    public $name;
    public $password;
    public $passwordConfirm;
    public $login;

    /** Получаем данные с POST запроса*/

    public function __construct($values)
    {
        if($this->check_params($values) === true)
        {
            $this->name = $values['name'];
            $this->password = $values['password'];
            $this->passwordConfirm = $values['password_confirm'];
            $this->login = $values['login'];
        }
    }

    public function sing_up()
    {
        $db = $this->get_db_info();
        if($this->check_login($this->login, $db))
            die($this->returnHtmlError('Такой логин уже существует'));

        if($this->passwordConfirm = $this->password_verify($this->password, $this->passwordConfirm)) {
            return $this->addInDbFile();
        }else
            die($this->returnHtmlError('Пароли не совпадают'));
    }

    public function get_db_info()
    {
        $result = [];
        if($file = $this->fopen('r'))
        {
            while (($data = fgetcsv($file, 1000, ';')) !== false)
                $result[] = $data;
            $this->fclose($file);
            return $result;
        }else
            return null;
    }

    public function check_login($login, $db)
    {
        for ($i=0;$i<count($db);$i++)
        {
            if($db[$i][1] == $login)
                return true;
        }
        return false;
    }

    /** Валидация данных */
    public function check_params($values)
    {
        if($values['name'] == '')
            die($this->returnHtmlError('Имя обязательно для заполнения'));
        elseif($values['login'] == '')
            die($this->returnHtmlError('Логин обязателен для заполнения'));
        elseif($values['password'] == '')
            die($this->returnHtmlError('Пароль обязателен для заполнения'));
        elseif($values['password_confirm'] == '')
            die($this->returnHtmlError('Подтвердите пароль'));
        else
            return true;
    }

    public function returnHtmlError($error)
    {
        return '<div class="alert alert-danger">'.$error.'</div>';
    }

    public function password_verify($password, $password_confirm)
    {
        $password_confirm = password_hash($password_confirm, PASSWORD_DEFAULT);

        if (password_verify($password, $password_confirm))
            return $password_confirm;
        else
            return false;
    }

    public function fopen($mode)
    {
        return fopen('../layuots/DB.csv', $mode);
    }

    public function fclose($file)
    {
        return fclose($file);
    }

    /** Добавление данных в файл */
    public function addInDbFile()
    {
        $file = $this->fopen('a');
        fputcsv($file,
            [
                'name' => $this->name,
                'login' => $this->login,
                'password_hash' => $this->passwordConfirm
            ], ';');
        $this->fclose($file);

        return true;
    }
}