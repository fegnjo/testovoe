<?php
require_once '../DataBase/DB.php';

$host = 'mysql:host=localhost;dbname=Users';
$user = 'root';
$pass = '';

new DB($host, $user, $pass);

