<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");

$room = $starttime = $endtime =  $startdate = $enddate = $repeattype = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	global $room;
	global $starttime;
	global $endtime;
	global $startdate;
	global $enddate;
	global $repeattype;

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
	if(isset($_POST['date']))
	{
		$startdate = $_POST['date'];
		echo $startdate;
	}
	if(isset($_POST['repeattype']))
	{
		$repeattype = $_POST['repeattype'];
	}
	if(isset($_POST['enddate']))
	{
		$enddate = $_POST['enddate'];
		echo $enddate;
	}

	$conn = connectDB();
	if(!$conn)
	{
		exit("Unable to connect to DB");
	}

	if($repeattype==0)
	{

	}
	else
	{
		//$isaval = checkifavailable($starttime, $endtime, $room, $conn);
		reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $room, $conn);
	}
}
else
{
	header("location:../index.php");
}

function reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $roomid, $conn)
{
	$repeatnum = $repeatinterval = "";
	$sd = date_create($startdate);
	$ed = date_create($enddate);
	$timediff = $sd->diff($ed);

	switch($repeattype)
	{
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
	echo $repeatnum;
	for($i=0;$i<=$repeatnum;$i++)
	{
		$date = date_create($startdate);
		$interval = $i.$repeatinterval;
		date_add($date, date_interval_create_from_date_string($interval));
		echo "<br />".$date->format('y-m-d');
		$reservestart = $date->format('y-m-d')." ".$starttime.":00";
		$reserveend = $date->format('y-m-d')." ".$endtime.":00";

		if(checkifavailable($starttime, $endtime, $roomid, $conn))
		{
			$query = "INSERT INTO `roomreservation` (`roomResNum`, `roomID`, `reservationStart`, `reservationEnd`, `userID`) VALUES (NULL, '$roomid', '$reservestart', '$reserveend', '0')"; //REPLACE UID
			$result = $conn->query($query);
		}
		else
		{
			echo "Room not available on $reservestart";
		}
	}
}

function checkifavailable($stime, $etime, $roomid, $conn)
{
	$query = "SELECT * FROM `roomreservation` WHERE roomID = $roomid AND '$stime' >= reservationStart AND '$etime' >= reservationEnd";
	
	$result = $conn->query($query);
	if(!$result) die("Error.");
	
	$rows=$result->num_rows;
	if($rows>0)
	{
		echo "not available";
		return false;
	}
	else
	{
		echo "is available";
		return true;
	}
}

?>