<?php
setcookie('user', $checkLogin['name'], time() - 3600 * 24 * 360, "/");
header("Location: ../auth.php");