<?php
function connectDB()
{
	//page 236
	//localhost version
	$hostname="localhost";
	$db="project";
	$pwd="semanager";
	$user="semanager";
	//page 273
	//server version
	//$hostname = "fdb20.awardspace.net";
	//$db = "3134042_pizzaplace";
	//$pwd = "password1";
	//$user = "3134042_pizzaplace";

	$conn = new mysqli($hostname, $user, $pwd, $db);
	if($conn->connect_error) die("Connection to DB error!");

	return $conn;
}
?>