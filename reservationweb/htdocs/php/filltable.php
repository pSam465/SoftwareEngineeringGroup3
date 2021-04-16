<?php
require_once("../php/connect.php");

showrooms();

function showrooms()
{
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

		$query = generatequery($date, $starttime, $endtime);
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
					$desc = $row['roomID'];
					echo<<<_END
					<tr class="selectablerow">
						<td>$room</td>
						<td hidden id="roomid">$id</td>
						<td> <button type="button" id="roomInfoBtn" class="roomInfoBtn"> 
							Room Information 
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
}

function generatequery($date, $starttime, $endtime)
{
	$query = "";

	if(!(empty($date) && empty($starttime) && empty($endtime)))
	{
		$startdate = $date." ".$starttime.":00";
		$enddate = $date." ".$endtime.":00";
		$query = "SELECT * FROM `room` WHERE room.roomID NOT IN(SELECT roomreservation.roomID FROM roomreservation WHERE '$startdate' <= roomreservation.reservationEnd AND NOT '$enddate' <= roomreservation.reservationStart);";
	}
	return $query;
}
?>