<?php
session_start();
$valid_username="Nuri Mala Dewi";
$valid_password="3";

if(isset($_POST["username"]) and isset($_POST["password"]))
{/*variabel session sudah dideklarasi*/
if($_POST["username"]==$valid_username and
	$_POST["password"]==$valid_password)
{/*status login:valid*/
	$_SESSION["star_login"]=1;
	$_SESSION["username"]=$_POST["username"];
	$_SESSION["password"]=$_POST["password"];
	
	header("location:homepage.php"); //redirect ke homepage
}
else
{/*status login:invalid*/
echo "username atu password salah<br><br>";
die("silahkan klik <a href='index.php'>di sini</a> untuk login lagi");
}
}
else
{/* variabel session belum dideklarasi*/
echo "data tidak lengkap";
}
?>