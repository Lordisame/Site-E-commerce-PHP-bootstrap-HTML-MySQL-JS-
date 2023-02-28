<?php

session_start();

if ($_SESSION["role"]="admin") {
	session_destroy();
	header("location:login.php");
}else{
	header("location:index.php");
}


?>