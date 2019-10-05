<?php
session_start();

unset($_SESSION["star_login"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);

session_destroy();
echo "logout berhasil, silahkan klik
<a href='index.php'> disini</a> untuk login";
?>