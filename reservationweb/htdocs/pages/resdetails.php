<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");
defaultHeader();

$room = $date = $starttime = $endtime = $repeattype = $endrepeat = $roominfo = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	global $room;
	global $equipment;
	global $date;
	global $starttime;
	global $endtime;
	global $type;

	if(isset($_POST['room']))
	{
		$room = $_POST['room'];

		$conn = connectDB();
		$query = "SELECT * FROM `room` WHERE roomID = $room;";
		$result = $conn->query($query);
		if(!$result) die("Could not get room details");
		if(($result->num_rows)>0)
		{
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$roominfo = $row['building']." ".$row['roomNum'];
		}
	}
	else if(isset($_POST['equipment']))
	{
		$equipment = $_POST['equipment'];

		$conn = connectDB();
		$query = "SELECT * FROM `equipment` WHERE equipID = $equipment;";
		$result = $conn->query($query);
		if(!$result) die("Could not get equipment details");
		if(($result->num_rows)>0)
		{
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$equipinfo = $row['equipName'];
		}
	}
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
	if(isset($_POST['starttime']))
	{
		$starttime = $_POST['starttime'];
	}
	if(isset($_POST['endtime']))
	{
		$endtime = $_POST['endtime'];
	}
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
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
	<div class="row">
		<div class="col-sm content-block m-2">
			<div>
				<h3>Reservation Details</h3>
					<div>
						<?php
						if($type == "room")
						{
							echo "<span><h5>Room: </h5> {$roominfo} </span>";
						}
						else if($type == "equipment")
						{
							echo "<span><h5>Equipment: </h5> {$equipinfo} </span>";
						}
						?>
						<p><h5>Date: </h5><?php echo $date; ?></p>
						<p><h5>Start Time: </h5><?php echo $starttime; ?></p>
						<p><h5>End Time: </h5><?php echo $endtime; ?></p>
					</div>
			</div>
		</div>
		<div class="col-sm content-block m-2">
			<form method="POST" action="../php/formsubmit.php" autocomplete="off" >
			<div class="form-group">
				<h4>Repeat Event</h4>
				<div>
					<select class="form-control" id="repeattype" name="repeattype" onchange="checkSelected()">
						<option value="0">Do not repeat</option>
						<option value="1">Repeat Daily</option>
						<option value="2">Repeat Weekly</option>
						<option value="3">Repeat Monthly</option>
						<option value="4">Repeat Yearly</option>
					</select>
					<div id="repeatcal" style="display:none;">
						<h5>Repeat Until:</h5>
						<input type="date" class="form-control" name="enddate" />
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-lg btn-block form-control mt-3">Reserve Room</button>
			</div>
				<?php
					if($type == "room")
					{
						echo '<input type="hidden" name="room" value="<?php global $room; echo $room; ?>">';
					}
					else if($type == "equipment")
					{
						echo '<input type="hidden" name="equipment" value="<?php global $equipment; echo $equipment; ?>">';
					}
				?>
				<input type="hidden" name="date" value="<?php global $date; echo $date; ?>">
				<input type="hidden" name="starttime" value="<?php global $starttime; echo $starttime; ?>">
				<input type="hidden" name="endtime" value="<?php global $endtime; echo $endtime; ?>">
			</form>
		</div>
	</div>
</div>
</body>

<script type="text/javascript">
function checkSelected()
{
	var repeat = document.getElementById("repeattype").value;
	var cal = document.getElementById("repeatcal");
	if(repeat > 0)
	{
		cal.style.display = "";
	}
	else
	{
		cal.style.display = "none";
	}
}
</script>

</html>