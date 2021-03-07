<?php
require_once("../php/connect.php");
include_once("../php/default.php");
defaultHeader();
defaultBody();

$nullEntryPresent = false;
$userID=NULL;
$firstName =NULL;
$lastName =NULL ;
$email=NULL;
$password=NULL;
$position=NULL;

if(isset($_POST['submit']))
{
	$userID=$_POST['userID'];
	$firstName=$_POST['fName'];
	$lastName=$_POST['lName'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$position=$_POST['position'];
	if($firstName == NULL || $lastName == NULL || $email == NULL || $password == NULL)
	{
		$nullEntryPresent = true;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Confirmation</title>
</head>
<style type="text/css">
  	.centerConf
  	{
  		text-align: center;
  	}

  	body
  	{
  		background-color: #1C4F9C;
  	}
  	.containOutput
  	{
		margin: auto;
		width: 30%;
  	}
  	.centerContainedOutput
  	{
  		margin: 10px;
  		border: 5px solid #1C5438;
  		padding: 10px;
  		background-color: white;
  		width: 550px;
  		height: 550px;
  		text-align: center;
  	}
</style>
<body>
	<div class="containOutput">
		<div class="centerContainedOutput">
			<h1>
				<?php 
			 		$conn = connectDB();
			 		$insert = "INSERT INTO `user` (`userID`, `email`, `password`, `position`, `fName`, `lName`) VALUES ($userID, '$email', '$password', '$position', '$firstName', '$lastName')";
			 		$conn->query($insert);

			 		echo "$position account for $firstName $lastName has been created with email, $email, and password, $password.";
			 	?>
			 	<form action="adminaccmain.php">
			 		<input style = "margin: 10vh; border: 1px solid black; height: 50px; font-size: 70%;" type="submit" value="Back to account list">
			 	</form>
			</h1>
		</div>
	</div>
</body>
</html>