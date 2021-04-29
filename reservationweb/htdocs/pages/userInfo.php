<?php
	session_start();
	include_once ('../php/connect.php');
	$dataConnect = connectDB() or die();
	//$fromSesId= 111;
	$fromSesId= $_SESSION["uid"];

	$emailQ= "SELECT email, userID, position, fName, lName FROM user WHERE email = ". $fromSesId;
	$result= $dataConnect->query($emailQ);
	$output= $result->fetch_assoc();
	$Email= $output['email'];
	$userId= $output['userID'];
	$name=  $output['fName'] . " " . $output['lName'];
	$position= $output['position'];
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
      margin: 1vh;
      border: 5px solid #1C5438;
      padding: 1vh;
      background-color: white;
      width: 550px;
      height: auto;
      text-align: center;
      position: absolute;
      left: 32vw;
    }
    .redFont
    {
      color:red;
    }
  </style>
<?php
    include_once('../php/default.php');
    defaultHeader();
  ?>
<body>
	<div class="centerForm" style="text-align: center;">
      <div class="containOutput">
        <div class="centerContainedOutput">
          <h1>User Info</h1> <br> <br>
          <p style= "text-align:left"> Email : <?php echo $Email?> </p> <br>
          <p style= "text-align:left"> Name : <?php echo $name?> </p>  <br>
          <p style= "text-align:left"> UserID : <?php echo $userId?> </p> <br>
          <p style= "text-align:left"> Position : <?php echo $position?> </p> <br>
      	</div>
      </div>
	</div>
</body>
</html>