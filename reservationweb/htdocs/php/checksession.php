<?php

session_start();
if(!isset($_SESSION['valid']))
{
	echo "NO SESSION >:(";
	header("Location:../pages/userlogin.php");
}
?>