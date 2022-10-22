<?php
require_once '../Class/Main.php';

$sing_up = new Main($_POST);

if($sing_up->sing_up())
    echo 'success';