<?php
$login = $_POST['login'];
$password = $_POST['password'];

$res = 0;
if(($file = fopen('DB.csv', 'r')) !==false ) {
    while(($data = fgetcsv($file, 1000, ';')) !==false){
        if($login == $data[1] && password_verify($password, $data[2])){
            $res = 'Вы вошли';
            setcookie('user', $data[1], time() + 3600 * 24 * 360, '/');
            header("Location: ../LK.php");
        }else {
            $res = 'Неверный логин или пароль';
        }
    }
    echo $res;
}