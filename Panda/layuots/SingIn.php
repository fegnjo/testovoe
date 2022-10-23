<?php

require_once '../Class/SingIn.php';

$sing_in = new SingIn($_POST);

$login = $sing_in->sing_in();
if ($login)
{
    session_start();
    $_SESSION['login'] = $login;
    echo 'success';
}

