<?php
require_once("../php/connect.php");
include_once("../php/default.php");
require_once("../php/checksession.php");
$roomRN = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservation Removal</title>
</head>
<style>
	h1
	{
		font-size: 24px;
		color: black;
	}
	.showForm
	{
		width: 50%;
		height:auto;
		text-align: center;
		background-color: white;
		margin-top:10px;
		margin-left: 20%;
	}
	.positonRemoveButton
	{
		margin-top: 1vh;
	}
	
</style>
<body>
	<div class="showForm"><h1>Remove A Reservation</h1>
		<?php
			removeReservation();
		?>
	</div>
</body>
</html>

<?php
function removeReservation()
{
	$conn = connectDB();
	$numRowsQuery = $conn->query("SELECT * FROM roomreservation");
	
	$numRows = $numRowsQuery->num_rows;
	echo "<form action=\"removehandle.php\" method=\"POST\">
	<table class = \"table\" style=\"width:100%; text-align:left;\">
				<thead>
				<tr>
					<th scope=\"col\">Select</th>
					<th scope=\"col\">Reservation Number</th>
					<th scope=\"col\">Room ID</th>
					<th scope=\"col\">Start Time</th>
					<th scope=\"col\">End Time</th>
					<th scope=\"col\">User ID</th>
				</tr>
				</thead>
				<tbody>";
	for($i = 0; $i < $numRows; $i++)
	{
		$numRowsArr = $numRowsQuery->fetch_assoc();
		$roomRN = $numRowsArr['roomResNum'];
		$roomID = $numRowsArr['roomID'];
		$st = $numRowsArr['reservationStart'];
		$et = $numRowsArr['reservationEnd'];
		$uID= $numRowsArr['userID'];

		echo"<tr>
			<td>
			<input type=\"checkbox\" name=\"remove[]\" value = \"$roomRN\"></input>
			</td>
			<td>$roomRN</td>
			<td>$roomID</td>
			<td>$st</td>
			<td>$et</td>
			<td>$uID</td>
		</tr>
		</form>";
	}
	echo "</tbody>
	</table>";
	echo "
	<div class=\"positonRemoveButton\">
			<button type=\"submit\" style = \"font-weight: bold;\" name = \"removeThese\">Remove Reservation(s) From DB</button>
	</div>
	</form>";

}
?>