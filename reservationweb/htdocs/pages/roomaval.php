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
			<table class="table table-striped table-fixed">
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
			echo "</tbody></table>";
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
			<div class="col-sm d-flex justify-content-center content-block">
				<div class="container scrollable">
				<?php
					$askrooms = "SELECT * FROM `room`";
					showrooms($askrooms);
				?>
				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col d-flex justify-content-center content-block">
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" />
							<div>
								<h3>Select a Date</h3>
							</div>
							<div class="form-group">
								<input type="date" class="form-control" id="date" name="date" value="<?php echo getdate() ?>" />
							</div>		
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col d-flex justify-content-center content-block">
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" />
							<div>
								<h3>Select a Time</h3>
							</div>
							<div class="form-group">
								Start<input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo gettimeofday() ?>" />
							</div>
							<div class="form-group">
								End<input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo gettimeofday() ?>" />
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>