<?php

$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($name == ''){
    echo 'Имя обязательно для заполнения';
    exit();
} elseif ($login == '') {
    echo 'Login обязателен для заполнения';
    exit();
} elseif ($password == '') {
    echo 'Пароль обязателен для заполнения';
    exit();
}elseif ($password_confirm == '') {
    echo 'Подтвердите пароль';
    exit();
}



if(($file = fopen('DB.csv', 'r')) !==false ) {
    while (($data = fgetcsv($file, 1000, ';')) !== false) {
        if ($data[1] == $login) {
            echo 'Такой логин уже существует';
            exit();
        }
    }
    $password = $_POST['password'];
    $password_confirm = password_hash($_POST['password_confirm'], PASSWORD_DEFAULT);

    if (password_verify($password, $password_confirm)) {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        unset($_POST['password_confirm']);
        $file = fopen('DB.csv', 'a');
        fputcsv($file, $_POST, ';');
        header("Location: ../auth.php");
    } else echo 'Пароли не совпадают';
}
fclose($file);