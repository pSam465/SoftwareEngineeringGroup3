<?php
    include_once('../php/default.php');
    require_once('../php/checksession.php');
    require_once("../php/sqlSts.php");
    defaultHeader();

    function showrooms($query)
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
			echo<<<_END
			<div class="container">
			<table class="table table-fixed">
			<thead><th scope="col">Room</th><thead>
			<tbody>
			_END;
			for($i=0; $i<$rows; $i++)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$room = $row['building'] . " " . $row['roomNum'];

				echo<<<_END
				<tr>
				<td>$room</td>
				</tr>
				_END;
			}
			echo "</tbody></table></div>";
		}
		else
		{
			echo "No rooms available";
		}
    }
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">

	<title>Room Reservation</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col d-flex justify-content-center content-block">
				<?php
					$askrooms = "SELECT * FROM `room`";
					showrooms($askrooms);
				?>
			</div>
			<div class="col">
				<div class="row">
					<div class="col d-flex justify-content-center content-block">
						test a
					</div>
				</div>
				<div class="row">
					<div class="col d-flex justify-content-center content-block">
						test b
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>