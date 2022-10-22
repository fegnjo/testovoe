<?php
session_start();
setcookie('user', $_SESSION['login'], time() - 3600 * 24 * 360, "/");
session_destroy();
header("Location: ../auth.php");