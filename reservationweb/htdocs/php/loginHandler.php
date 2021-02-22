<?php
require_once("./sqlSts.php");

$conn = connectDB();
if(!$conn){
	exit("Unable to connect to DB");
}

$email = $_POST["email"];
$password = $_POST["password"];
$query = "SELECT * FROM user WHERE email=\"$email\" AND password=\"$password\"";
$result = $conn->query($query);
if(!$result) die("Error on login. Try again.");
if(($result->num_rows)>0){
	//begin session
	//session.start();
	setcookie("name", 1, time()+86400*30);
	//$_SESSION['user'] = "user";
	header("Location: ../pages/dummyLogin.php");
}
else{
	echo "Error, please try again";
	header("Location: ../pages/userlogin.php");
}
?>