<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");
defaultHeader();

$date = $starttime = $endtime = $askquery = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	global $date;
	global $starttime;
	global $endtime;
	global $askquery;
	
	//Set all of the submitted variales
	if(!empty($_POST['date']))
	{
		$date = $_POST['date'];
	}
	if(!empty($_POST['starttime']))
	{
		$starttime = $_POST['starttime'];
	}
	if(!empty($_POST['endtime']))
	{
		$endtime = $_POST['endtime'];
	}
	if(!empty($_POST['askquery']))
	{
		$askquery = $_POST['askquery'];
	}
}

function showrooms()
{
	$query = generatequery();
	if(!empty($query))
	{
		$conn = connectDB();
		if(!$conn)
		{
			exit("Unable to connect to DB");
		}
		$result = $conn->query($query);
		if(!$result) die("Error.");
		$rows=$result->num_rows;
		if($rows>0)
		{
			echo "<tbody>";
			for($i=0; $i<$rows; $i++)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$room = $row['building'] . " " . $row['roomNum'];

				echo<<<_END
				<tr>
				<td>$room</td>
				</tr>
				_END;
			}
			echo "</tbody>";
		}
	}
}

function generatequery()
{
	global $date;
	global $starttime;
	global $endtime;
	$query = "";

	if(!(empty($date) && empty($starttime) && empty($endtime)))
	{
		$startdate = $date." ".$starttime.":00";
		$enddate = $date." ".$endtime.":00";
		$query = "SELECT * FROM `room` WHERE room.roomID NOT IN(SELECT roomreservation.roomID FROM roomreservation WHERE '2021-03-15 $startdate' <= roomreservation.reservationEnd AND NOT '$enddate' <= roomreservation.reservationStart) ";
	}
	return $query;
}
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">

	<title>Room Reservation</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md content-block">
				<div class="row">
					<div class="col-sm d-flex justify-content-center">	
						<input type="text" type="form-control" name="roomsearch" id="roomsearch" placeholder="Search for a room" style="width: 100%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm d-flex justify-content-center">
					<div class="container scrollable">
						<table class="table table-hover table-fixed" id="roomtable">
							<thead><th scope="col">Room</th><thead>
							<?php
								showrooms();
							?>
						</table>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" />
				<div class="content-block">
				<div class="row">
					<div class="col d-flex justify-content-center">
						<div class="align-self-center">
							<h3>Select a Date</h3>
						</div>
						<div class="form-group">
							<input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>" />
						</div>
					</div>
				</div>
				<hr class="rounded">
				<div class="row">
					<div class="col d-flex justify-content-center">
						<div class="align-self-center">
							<h3>Select a Time</h3>
						</div>
						<div class="form-group">	
							Start<input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $starttime ?>" />
						</div>
						<div class="form-group">
							End<input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $endtime ?>" />
						</div>
					</div>
				</div>
				<hr class="rounded">
				<div class="row">
					<div class="col d-flex justify-content-center">
						<button type="submit" class="btn btn-outline-info btn-lg btn-block">Find a Room</button>
					</div>
				</div>
				</div>
				</form>
				<div class="row">
					<div class="col d-flex justify-content-center">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Reserve Room</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>