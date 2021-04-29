<?php
require_once("../php/connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
	$date = $starttime = $endtime = "";
	if(!empty($_GET['date']))
	{
		$date = $_GET['date'];
	}
	if(!empty($_GET['starttime']))
	{
		$starttime = $_GET['starttime'];
	}
	if(!empty($_GET['endtime']))
	{
		$endtime = $_GET['endtime'];
	}
	if(!empty($_GET['type']))
	{
		$type = $_GET['type'];
	}

	if($type == "room")
	{
		showrooms($date, $starttime, $endtime);
	}
	else if($type == "equipment")
	{
		showequipment($date, $starttime, $endtime);
	}
}

function showrooms($date, $starttime, $endtime)
{
	$query = generatequery($date, $starttime, $endtime, "room");
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
			echo '<thead><th scope="col">Room</th><th scope="col">Info</th><thead>';
			echo "<tbody id=\"tablebody\">";
			for($i=0; $i<$rows; $i++)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$room = $row['building'] . " " . $row['roomNum'];
				$id = $row['roomID'];
				$desc = $row['roomDesc'];
				echo<<<_END
				<tr class="selectablerow">
					<td>$room</td>
					<td hidden id="roomid">$id</td>
					<td> <button type="button" id="roomInfoBtn" class="roomInfoBtn btn btn-outline-secondary"> 
						Room Information
						<p hidden class="roomInfo">$room</p> 
						<p hidden class="description">$desc</p> 
						</button> 
					</td>
				</tr>
				_END;
			}
			echo "</tbody>";
		}
	}
}

function showequipment($date, $starttime, $endtime)
{
	$query = generatequery($date, $starttime, $endtime, "equipment");
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
			echo '<thead><th scope="col">Equipment</th><th scope="col">Type</th><thead>';
			echo "<tbody id=\"tablebody\">";
			for($i=0; $i<$rows; $i++)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$name = $row['equipName'];
				$type = $row['equipType'];
				$id = $row['equipID'];
				echo<<<_END
				<tr class="selectablerow">
					<td>$name</td>
					<td>$type</td>
					<td hidden id="equipid">$id</td>
				</tr>
				_END;
			}
			echo "</tbody>";
		}
	}
}

function generatequery($date, $starttime, $endtime, $type)
{
	$query = "";

	if(!(empty($date) && empty($starttime) && empty($endtime)))
	{
		$startdate = $date." ".$starttime.":00";
		$enddate = $date." ".$endtime.":00";
		if($type == "room")
			$query = "SELECT * FROM `room` WHERE room.roomID NOT IN(SELECT roomreservation.roomID FROM roomreservation WHERE '$startdate' <= roomreservation.reservationEnd AND NOT '$enddate' <= roomreservation.reservationStart);";
		if($type == "equipment")
			$query = "SELECT * FROM `equipment` WHERE equipment.equipID NOT IN(SELECT equipreservation.equipID FROM equipreservation WHERE '$startdate' <= equipreservation.reservationEnd AND NOT '$enddate' <= equipreservation.reservationStart);";
	}
	
	return $query;
}

?>