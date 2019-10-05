<?php
session_start();
if (!isset ($_SESSION["start_login"]) and
	 !isset ($_SESSION["username"]) and
	 !isset ($_SESSION["password"]))
{
	die("anda belum login, silahkan klik
	<a href='index.php'>di sini</a> untuk login");
}
else
{
echo	"<p>
		Login berhasil, selamat datang
		".$_SESSION["username"].
		"</p>";
	echo "<p><a href='logout.php'>Logout</a></p>";
}
?>