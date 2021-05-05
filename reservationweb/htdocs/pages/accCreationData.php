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
	<link rel="stylesheet" type="text/css" href="../css/default.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Account Confirmation</title>
</head>
<body>
	<div class="containOutput">
		<div class="centerContainedOutput">
			<h1>
				<?php 
			 		$conn = connectDB();
			 		$insert = "INSERT INTO `user` (`userID`, `email`, `password`, `position`, `fName`, `lName`) VALUES ($userID, '$email', SHA1('{$password}'), '$position', '$firstName', '$lastName')";
			 		$conn->query($insert);

			 		echo "$position account for $firstName $lastName has been created with email, $email, and password, $password.";
			 	?>			
				<button class="btn btn-primary" onclick="location.href = '../pages/admincontrols.php';">Return</button>
			</h1>
		</div>
	</div>
</body>
</html>