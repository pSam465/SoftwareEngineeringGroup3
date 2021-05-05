<?php
	require_once('../php/default.php');
	require_once('../php/checksession.php');
	require_once("../php/connect.php");
	defaultHeader();
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/default.css">
	
	<title>Confirmation</title>
</head>
<style type = "text/css">
	body
	{
		background-color: #1C4F9C;
	}
	.whiteBG
	{
		background-color: white;
		width: 50vw;
		margin-top: 1vh;
		margin-left: 25%;
		height:auto;
	}
</style>
<body>
	<div class="body">
		<div class = "whiteBG">
			<h1 style="text-align: center;">Your Reservation has been Confirmed</h1>
			<?php
				$conn = connectDB();

				if(isset($_POST['room1']))
					$roomID = $_POST['room1'];
				else if(isset($_POST['equipment']))
					$equipID = $_POST['equipment'];	
								
				$startTiempo = $_POST['start'];
				$endTiempo = $_POST['end'];
				$startDate = $_POST['sdate'];
				$endDate = $_POST['edate'];
				$rpType = $_POST['rep'];
				$user = $_SESSION['email'];
				$repeat = null;

				if(isset($roomID))
				{
					$findType = "SELECT `roomType`,`roomNum` FROM `room` WHERE roomID = $roomID";
				}
				else if(isset($equipID))
				{
					$findType = "SELECT `equipType`,`equipName` FROM `equipment` WHERE equipID = $equipID";
				}
				$result = $conn->query($findType);
				$outputResult = $result->fetch_assoc();
				
				if(isset($roomID))
				{
					$output = $outputResult['roomType'];
					$roomNum = $outputResult['roomNum'];
				}
				else if(isset($equipID))
				{
					$output = $outputResult['equipType'];
					$equipment = $outputResult['equipName'];
				}
				$output = strtolower($output);


				$americanizedDate = date("m-d-Y",strtotime($startDate));
				$endDate = date("m-d-Y",strtotime($endDate));

				$explodeTime = explode(":", $startTiempo);
				$explodeTime2 = explode(":", $endTiempo);

				if(intval($explodeTime[0],10) >= 12)
				{
					if(intval($explodeTime[0],10) == 12)
					{
						$startTiempo = "12".":".$explodeTime[1]."PM";
					}
					else
					{
						$dec = intval($explodeTime[0],10) - 12;
						$startTiempo = $dec.":".$explodeTime[1]."PM";
					}
				}
				else if(intval($explodeTime[0],10) < 12)
				{
					if(intval($explodeTime[0],10) == 0)
					{
						$startTiempo = "12".":".$explodeTime[1]."AM";
					}
					else
					{
						$dec = intval($explodeTime[0],10);
						$startTiempo = $dec.":".$explodeTime[1]."AM";
					}
				}

				if(intval($explodeTime2[0],10) >= 12)
				{
					if(intval($explodeTime2[0],10) == 12)
					{
						$endTiempo = "12".":".$explodeTime2[1]."PM";
					}
					else
					{
						$dec = intval($explodeTime2[0],10) - 12;
						$endTiempo = $dec.":".$explodeTime2[1]."PM";
					}
				}
				else if(intval($explodeTime2[0],10) < 12)
				{
					if(intval($explodeTime2[0],10) == 0)
					{
						$endTiempo = "12".":".$explodeTime2[1]."AM";
					}
					else
					{
						$dec = intval($explodeTime2[0],10);
						$endTiempo = $dec.":".$explodeTime2[1]."AM";
					}
				}
				
				if(isset($roomID))
				{
					switch ($rpType) 
					{
						case 0:
							$repeat = "daily";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo. Your room number is $roomNum.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 1:
							$repeat = "daily";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your room number is $roomNum.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 2:
							$repeat = "weekly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your room number is $roomNum.<br>An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 3:
							$repeat = "monthly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your room number is $roomNum.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 4:
							$repeat = "yearly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your room number is $roomNum.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
					}
				}
				else if(isset($equipID))//I seriously cannot belive I am writing code of this quality in a senior level class.....
				{
					switch ($rpType) 
					{
						case 0:
							$repeat = "daily";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo. Your equipment is $equipment.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 1:
							$repeat = "daily";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your equipment is $equipment.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 2:
							$repeat = "weekly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your equipment is $equipment.<br>An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 3:
							$repeat = "monthly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your equipment is $equipment.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
						case 4:
							$repeat = "yearly";
							echo "<div>
								<p>The $output is reserved under 
									$user on $americanizedDate at $startTiempo until $endTiempo and will repeat $repeat until $endDate. Your equipment is $equipment.<br> An Email Has Been Sent Confirming This Reservation.
								</p>
							</div>";
							break;
					}
				}
			?>
			<button id ="butt" type="button" class="btn btn-success" style="margin: 0;margin-left:20vw;position: relative;">Return to Home Page</button>
		</div>
	</div>
</body>
<script type="text/javascript">
    document.getElementById("butt").onclick = function () {
        location.href = "../index.php";
    };
</script>
</html>
