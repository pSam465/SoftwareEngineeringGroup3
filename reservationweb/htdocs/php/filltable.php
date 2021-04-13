<?php
require_once("../php/connect.php");

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
			echo "<tbody id=\"tablebody\">";
			for($i=0; $i<$rows; $i++)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$room = $row['building'] . " " . $row['roomNum'];
				$id = $row['roomID'];
				echo<<<_END
				<tr class="selectablerow">
				<td>$room</td>
				<td hidden id="roomid">$id</td>
				</tr>
				_END;
			}
			echo "</tbody>";
		}
	}
}
?>