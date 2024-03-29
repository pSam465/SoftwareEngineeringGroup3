<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");
?>

<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">

	<title>Update Room Information</title>
</head>
<style type="text/css">
	.row
	{
		margin-top: -10px !important;
	}
</style>
<body>
	<div class="row">
		<div class="col-sm d-flex justify-content-center">
		<div>
			<table class="table table-hover table-fixed selectabletable" id="filtertable">
				<h3 align="center">Update Room Information</h3>
				<thead>
					<th scope="col">Room ID</th>
					<th scope="col">Room Number</th>
					<th scope="col">Building</th>
					<th scope="col">Room Type</th>
					<th scope="col">Description</th>
					<th scope="col">Availability</th>
				<thead>
					<?php
					$conn = connectDB();
					if(!$conn)
					{
						exit("Unable to connect to the database.");
					}
					$query = "SELECT * FROM room";
					$result = $conn->query($query);
					if(!$result) die("Error");

					$rows = $result->num_rows;

					if($rows > 0)
					{
						echo "<tbody id=\"tablebody\">";
						for($i=0; $i<$rows; $i++)
						{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							$id = $row['roomID'];
							$type = $row['roomType'];
							$building = $row['building'];
							$roomNum = $row['roomNum'];
							$avail = $row['roomAvailability'];
							$desc = $row['roomDesc'];

							echo<<<_END
							<form action="../php/updatehandler.php" method="GET">
							<tr>
								<td id='roomid' name="roomID">$id</td>
								<td id='roomnum'><input name="roomNum" type="number" value=$roomNum></td>
								<td id='building'><input name="building" type="text" value='$building'></td>
								<td id='roomtype'><input name="roomType" type="text" value='$type'></td>
								<td id='description'><input name="desc" type="text" value='$desc'></td>
								<td id='availability'><input name="avail" type="number" value=$avail placeholder="This should be 1 (available) or 0 (unavailable)."></td>
								<td><input type="submit" name="roomUpdate" value="Update Room" ></td>
							</tr>
							</form>
							_END;
						}
						echo "</tbody>";
					}
					?>
			</table>
		</div>
		</div>
	</div>
</body>
</html>