<?php

use function PHPSTORM_META\type;

include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");

$starttime = $endtime =  $startdate = $enddate = $repeattype = $uid = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	global $equipment;
	global $room;
	global $starttime;
	global $endtime;
	global $startdate;
	global $enddate;
	global $repeattype;
	global $uid;

	if(isset($_POST['room']))
	{
		$room = $_POST['room'];
		echo "</br> Room: $room </br>";
	}
	else if(isset($_POST['equipment']))
	{
		$equipment = $_POST['equipment'];
	}
	
	if(isset($_POST['starttime']))
	{
		$starttime = $_POST['starttime'];
	}
	if(isset($_POST['endtime']))
	{
		$endtime = $_POST['endtime'];
	}
	if(isset($_POST['date']))
	{
		$startdate = $_POST['date'];
	}
	if(isset($_POST['repeattype']))
	{
		$repeattype = $_POST['repeattype'];
	}
	if(isset($_POST['enddate']))
	{
		$enddate = $_POST['enddate'];
	}
	if(isset($_SESSION['uid']))
	{
		$uid = $_SESSION['uid'];
	}
	
	$conn = connectDB();
	if(!$conn)
	{
		exit("Unable to connect to DB");
	}
	
	if(isset($room))
	{
		reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $room, $conn, $uid, "room");
		sendToConf($room,$starttime,$endtime,$startdate,$enddate,$repeattype, "room");
	}
	else if(isset($equipment))
	{
		reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $equipment, $conn, $uid,"equipment");
		//sendToConf($equipment,$starttime,$endtime,$startdate,$enddate,$repeattype,"equipment");
	}

	//header('Location:../pages/conf.php');
}
/*else
{
	header('Location:../index.php');
}*/

function reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $id, $conn, $uid, $type)
{
	$repeatnum = $repeatinterval = "";
	$sd = date_create($startdate);
	$ed = date_create($enddate);
	$timediff = $sd->diff($ed);

	switch($repeattype)
	{
		case 0:
			$repeatinterval = " days";
			$repeatnum = 0;
			break;
		case 1:
			$repeatinterval = " days";
			$repeatnum = $timediff->format('%a');
			break;
		case 2:
			$repeatinterval = " weeks";
			$repeatnum = $timediff->format('%a')/7;
			break;
		case 3:
			$repeatinterval = " months";
			$repeatnum = $timediff->format('%m');
			break;
		case 4:
			$repeatinterval = " years";
			$repeatnum = $timediff->format('%y');
			break;
	}

	for($i=0;$i<=$repeatnum;$i++)
	{
		$date = date_create($startdate);
		$interval = $i.$repeatinterval;
		date_add($date, date_interval_create_from_date_string($interval));
		$reservestart = $date->format('y-m-d')." ".$starttime.":00";
		$reserveend = $date->format('y-m-d')." ".$endtime.":00";

		echo $type;
		if(checkifavailable($reservestart, $reserveend, $id, $conn, $type))
		{
			if($type == "room")
			{
				$query = "INSERT INTO `roomreservation` (`roomResNum`, `roomID`, `reservationStart`, `reservationEnd`, `userID`) VALUES (NULL, '$id', '$reservestart', '$reserveend', '$uid')"; //REPLACE UID
			}
			else if($type == "equipment")
			{
				$query = "INSERT INTO `equipreservation` (`eReservationNum`, `equipID`, `reservationStart`, `reservationEnd`, `userID`) VALUES (NULL, '$id', '$reservestart', '$reserveend', '$uid')"; //REPLACE UID
			}

			$result = $conn->query($query);
			//echo "<br />Room reserved on ".$date->format('y-m-d');
		}
		else
		{
			//echo "<br />Room not available on ".$date->format('y-m-d');
		}
	}
}

function checkifavailable($stime, $etime, $id, $conn, $type)
{
	if($type == "room")
	{
		$query = "SELECT * FROM `roomreservation` WHERE roomID = $id AND '$stime' >= reservationStart AND '$etime' <= reservationEnd";
	}
	if($type == "equipment")
	{
		$query = "SELECT * FROM `equipreservation` WHERE equipID = $id AND '$stime' >= reservationStart AND '$etime' <= reservationEnd";
	}

	$result = $conn->query($query);
	if(!$result) die("Error.");
	
	$rows=$result->num_rows;
	if($rows>0)
	{
		echo "</ br> false </ br>";
		return false;
	}
	else
	{
		echo "</ br> true </ br>";
		return true;
	}
}

function sendToConf($r,$st,$et,$sd,$ed,$rt,$type)
{
	$repeating = 0;
	$conn = connectDB();
	$user = $_SESSION['email'];
	if($type == "room")
	{
		$result = $conn->query("SELECT `roomNum`,`roomType, building` FROM `room` WHERE roomID = $r");
	}
	else if($type == "equipment")
	{
		$result = $conn->query("SELECT `equipmentName` FROM `equipment` WHERE equipID = $r");
	}
	$outputResult = $result->fetch_assoc();
	$output = $outputResult['roomNum'];
	$building = $outputResult['building'];
	$roomSelected = $outputResult['roomType'];

	echo $output;

	switch ($rt) 
	{
		case 0:
			$repeating = " Never";
			break;
		case 1:
			$repeating = " Daily";
			break;
		case 2:
			$repeating = " Weekly";
			break;
		case 3:
			$repeating = " Monthly";
			break;
		case 4:
			$repeating = " Yearly";
			break;
	}

	echo "
	<form action = \"../pages/conf.php\" method = \"POST\" id = \"form1\">
		<input type = \"hidden\" name = \"room1\" value = \"$r\">
		<input type = \"hidden\" name = \"start\" value = \"$st\">
		<input type = \"hidden\" name = \"end\" value = \"$et\">
		<input type = \"hidden\" name = \"sdate\" value = \"$sd\">
		<input type = \"hidden\" name = \"edate\" value = \"$ed\">
		<input type = \"hidden\" name = \"rep\" value = \"$rt\">
	</form>
	<script type = \"text/javascript\">
		document.getElementById('form1').submit();
	  </script>";

	mail($user,"Reservation Confirmation", "Room Type: $roomSelected\nDate: $sd\nTime: $st-$et\nRoom Number: $building $output\nRepeating:$repeating","From: reservations@irissoln.com");
}
?>