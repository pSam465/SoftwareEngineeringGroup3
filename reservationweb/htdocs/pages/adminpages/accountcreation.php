<?php
require_once("../php/checksession.php");
include_once("../php/default.php");
defaultHeader();
defaultBody();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/default.css">
	<title>Account Creation</title>
</head>
<body>
	<div class="centerForm">
		<div class="containOutput">
			<div class="centerContainedOutput">
				<form action="accCreationData.php" method="POST">
					<label for="userID">User ID Number</label><br>
					<input type="text" id="userID" name="userID"><br><br>
					<label for="fName">First Name</label><br>
					<input type="text" id="fName" name="fName"><br><br>
					<label for="lName">Last Name</label><br>
					<input type="text" id="lName" name="lName"><br><br>
					<label for="email">User Email</label><br>
					<input type="text" id="email" name="email"><br><br>
					<label for="password">User Password</label><br>
					<input type="text" id="password" name="password"><br><br>
					<label for="userPosition">User Position</label><br>
					<select name="position" id="positions">
						<option value="student">Student</option>
						<option value="admin">Admin</option>
					</select>
					<br><br><br>
					<input type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>