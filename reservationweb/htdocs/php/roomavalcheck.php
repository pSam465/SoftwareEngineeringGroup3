<?php

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

?>