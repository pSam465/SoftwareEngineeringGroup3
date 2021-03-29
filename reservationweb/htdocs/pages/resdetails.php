<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");
defaultHeader();

$room = $starttime = $endtime = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	global $room;
	global $starttime;
	global $endtime;

	if(isset($_POST['room']))
	{
		$room = $_POST['room'];
	}
	if(isset($_POST['starttime']))
	{
		$starttime = $_POST['starttime'];
	}
	if(isset($_POST['endtime']))
	{
		$endtime = $_POST['endtime'];
	}
}

function createreservation()
{

}

?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">

	<title>Reservation Details</title>
</head>
<body>
<div class="container-fluid">
	<div class="col content-block">
		<div>
			<h3>Reservation Details<h3>
				<div class="content-block">
					<p><h5>Room: </h5><?php echo $room; ?></p>
					<p><h5>Start Time: </h5><?php echo $starttime; ?></p>
					<p><h5>End Time: </h5><?php echo $endtime; ?></p>
				</div>
		</div>
		<form>
		<div class="form-group">
			<h3>Repeat Event</h3>
			<select class="form-control">
				<option>Do not repeat</option>
				<option>Repeat Daily</option>
				<option>Repeat Weekly</option>
				<option>Repeat Monthly</option>
			</select>
			<button type="submit" class="btn btn-primary btn-lg btn-block form-control mt-3">Reserve Room</button>
		</div>
		</form>
	</div>
</div>
</body>
</html>