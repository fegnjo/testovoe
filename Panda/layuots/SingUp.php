<?php
require_once '../Class/SingUp.php';

$sing_up = new SingUp($_POST);

if($sing_up->sing_up())
    echo 'success';