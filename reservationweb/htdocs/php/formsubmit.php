<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");

$room = $starttime = $endtime =  $startdate = $enddate = $repeattype = $uid = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
	
	reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $room, $conn, $uid);
	sendToConf($room,$starttime,$endtime,$startdate,$enddate,$repeattype);

	//header('Location:../pages/conf.php');
}
/*else
{
	header('Location:../index.php');
}*/

function reserve($startdate, $enddate, $starttime, $endtime, $repeattype, $roomid, $conn, $uid)
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


		if(checkifavailable($reservestart, $reserveend, $roomid, $conn))
		{
			$query = "INSERT INTO `roomreservation` (`roomResNum`, `roomID`, `reservationStart`, `reservationEnd`, `userID`) VALUES (NULL, '$roomid', '$reservestart', '$reserveend', '$uid')"; //REPLACE UID
			$result = $conn->query($query);
			echo "<br />Room reserved on ".$date->format('y-m-d');
		}
		else
		{
			echo "<br />Room not available on ".$date->format('y-m-d');
		}
	}
}

function checkifavailable($stime, $etime, $roomid, $conn)
{
	$query = "SELECT * FROM `roomreservation` WHERE roomID = $roomid AND '$stime' >= reservationStart AND '$etime' <= reservationEnd";
	$result = $conn->query($query);
	if(!$result) die("Error.");
	
	$rows=$result->num_rows;
	if($rows>0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function sendToConf($r,$st,$et,$sd,$ed,$rt)
{
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
}
?>