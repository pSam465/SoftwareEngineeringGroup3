<?php
require_once("../php/connect.php");
include_once("../php/default.php");
require_once("../php/checksession.php");
defaultHeader();
$roomRN = "";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">
	<title>Reservation Removal</title>
</head>
<style>
	h1
	{
		font-size: 24px;
		color: black;
	}
	body
	{
		background-color: #1C4F9C;
	}
	.showForm
	{
		width: 60vw;
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
	<div class="showForm"><h1>Cancel A Reservation</h1>
		<?php
			removeUserReservation();
		?>
	</div>
</body>

</html>

<?php
function removeUserReservation()
{
		$conn = connectDB();
		$un = $_SESSION['email'];

		$getIDQ = $conn->query("SELECT `userID` FROM `user` WHERE `email`=\"$un\"") or die($conn->error);
		$getIDA = $getIDQ->fetch_assoc();
		$getID = $getIDA['userID'];
		

		$numRowsQuery = $conn->query("SELECT * FROM roomreservation where userID = \"$getID\"") or die($conn->error);

		
		$numRows = $numRowsQuery->num_rows;
		echo "
		<form action=\"userRemoveHandle.php\" method=\"POST\">
		<table class = \"table\" style=\"width:100%; text-align:left;\">
				 <thead>
				    <tr>
				      <th scope=\"col\">Select</th>
				      <th scope=\"col\">Reservation Number</th>
				      <th scope=\"col\">Start Time</th>
				      <th scope=\"col\">End Time</th>
				    </tr>
				  </thead>
				  <tbody>";
		for($i = 0; $i < $numRows; $i++)
		{
			$numRowsArr = $numRowsQuery->fetch_assoc();
			$roomRN = $numRowsArr['roomResNum'];
			$st = $numRowsArr['reservationStart'];
			$et = $numRowsArr['reservationEnd'];

			echo"<tr>
			  <td>
			  	<input type=\"checkbox\" name=\"remove[]\" value = \"$roomRN\"></input>
			  </td>
		      <td>$roomRN</td>
		      <td>$st</td>
		      <td>$et</td>
		    </tr>
		    </form>";
		}
		echo "</tbody>
		</table>";
		echo "
		<div class=\"positonRemoveButton\">
				<button type=\"submit\" style = \"font-weight: bold;\" name = \"removeThese\">Cancel Reservation(s)</button>
		</div>";
}
?>