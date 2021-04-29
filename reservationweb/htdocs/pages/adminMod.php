<?php
/*
	session_start();
	include_once ('../php/connect.php');
	$dataConnect = connectDB();
	//$fromSesId= 111;
	$fromSesId= $_SESSION["email"];
	$emailQ= "SELECT email, userID, position, fName, lName FROM user WHERE email = ". $fromSesId;
	$result= $dataConnect->query($emailQ);
	$output= $result->fetch_assoc();
	$Email= $output['email'];
	$userId= $output['userID'];
	$name=  $output['fName'] . " " . $output['lName'];
	$position= $output['position'];
	*/
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>UserInfo</title>
</head>
<style>
    .centerForm
    {
      text-align: center;
      margin: auto;
    }
    .containOutput
    {
      margin: auto;
      width: 30%;
    }
    .centerContainedOutput
    {
      margin: 1vh;
      border: 5px solid #1C5438;
      padding: 1vh;
      background-color: white;
      width: 550px;
      height: 700px;
      text-align: center;
    }
    .redFont
    {
      color:red;
    }
  </style>
<body>
	<div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
          <h1>Modify User Info</h1> <br> 
          <p>Sections left blank will not be changed</p><br>
        <form action="./accountMod.php" method="post">
        	<label for="userId">User Id:</label>
			<input type="text" id="userId" name= "userId" ><br><br>

			<label for="fname">New First name:</label>
			<input type="text" id="fname" name="fname" ><br><br>

			<label for="lname">New Last name:</label>
			<input type="text" id="lname" name="lname" ><br><br>

			<label for="email">New Email:</label>
			<input type="text" id= "email" name="email" ><br><br>

			<label for="password">New Password:</label>
			<input type="text" id="password" name= "password" ><br><br>

			<input type="radio" id= "admin" name="role" value="admin">
			<label for="admin">Admin</label><br>

			<input type="radio" id= "student" name="role" value="student">
			<label for="student">Student</label><br>
			
			<input type="radio" id= "leave" name="role" value="leave">
			<label for="leave">Do not change role </label><br>

			<input type="submit" onclick="location.href='./accountMod.php'" value="Submit" name="modSubmit">
		</form>
      	</div>
      </div>
	</div>
</body>
</html>