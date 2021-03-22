<?php
include_once('../php/checksession.php');						//currently commented out due to not having access to checksecion.php
include_once("../php/default.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<title>Admin Home Page</title>
</head>
<style>
	.button
	{
		display: block;
		width: 250px;
		height: 200px;
		border: 2px solid black;
		background-color: #1C5438;
		color: white;						/*font color*/
		font-size: 16px;
		text-align: center;
		float: left;
		margin: 20px;
		cursor: pointer;
	}
	.container
	{
		position: absolute;
		top: 40%;
		left: 35%;
	}
</style>
<?php
	defaultHeader();
	defaultBody();
?>
<body>
<div class="container">
	<div class="buttonGroup">
		<button type="button" class="button" onclick="location.href='./adminaccmain.php'">Account Management</button>
		<button type="button" class="button">Reservation Management</button> 		<!-- code to redirect on button press is onclick'"location.href='./(file_name).php'", same as the other button, just change the location to the correct file -->
	</div>
</div>
</body>
</html>