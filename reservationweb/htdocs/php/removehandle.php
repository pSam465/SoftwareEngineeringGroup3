<?php

require_once("../php/connect.php");
include_once("../php/default.php");
require_once("../php/checksession.php");
$storage=  array();
if(isset($_POST['removeThese']))
{

	if(!empty($_POST['remove']))
	{
		for($i = 0;$i <count($_POST['remove']);$i++)
		{
			array_push($storage, $_POST['remove'][$i]);
		}
		print_r($storage);

		$q ="DELETE FROM `roomreservation` WHERE `roomResNum` =";
		$conn2 = connectDB();
		for($i = 0;$i < count($storage);$i++)
		{
			echo "removed $storage[$i]";
			$conn2->query("DELETE FROM `roomreservation` WHERE `roomResNum` = $storage[$i];");
			if(!$conn2)
			{
				exit("Unable to connect to DB");
			}
		}
	}
}

header("Location: http://localhost/pages/admincontrols.php");
?>