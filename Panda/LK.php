<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

if (!$_COOKIE['user'])
    header("Location: registration.php");

$user = [];
if(($file = fopen('layuots/DB.csv', 'r')) !==false ) {
    while(($data = fgetcsv($file, 1000, ';')) !==false){
        if ($_COOKIE['user'] == $data[1]){
            $user = $data;
        }
    }
}

echo "<h4>ФИО: " . $user[0] . "</h4>";
echo "<h4>LOGIN: " . $user[1] . "</h4>";

echo "<a href='layuots/exit.php'>Нажмите для выхода</a>";
    ?>


</body>
</html>
