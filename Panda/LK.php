<?php session_start();
if (!array_key_exists('login', $_SESSION))
    header("Location: registration.php");
?>
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

    echo "<h4>LOGIN: " . $_SESSION['login'] . "</h4>";

    echo "<a href='layuots/exit.php'>Нажмите для выхода</a>";

    ?>

</body>
</html>
