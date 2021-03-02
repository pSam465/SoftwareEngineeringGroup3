<?php
	include_once ('../php/connect.php');

	$nullEntryPresent = false;
	$firstName =NULL;
	$lastName =NULL ;
	$email=NULL;
	$timeSlot=NULL;
	$room = NULL;
	$displaydate = NULL;
	$dbDate = NULL;
	if(isset($_GET['submit']))
	{
		$firstName = $_GET['firstName'];
		$lastName = $_GET['lastName'];
		$email = $_GET['emailAddress'];
		$timeSlot =  $_GET['time'];
		$room = $_GET['loc'];
		$displaydate = $_GET['date'];
		$dbDate = $_GET['hiddenDate'];
		$roomNumber = $_GET['dataRoomNum'];
		if($firstName == NULL || $lastName == NULL || $email == NULL ||$timeSlot == NULL)
		{
			$nullEntryPresent = true;
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Confirmation</title>
  </head>

  <style type="text/css">
  	.centerConf
  	{
  		text-align: center;
  	}

  	body
  	{
  		background-color: #1C4F9C;
  	}
  	.containOutput
  	{
		margin: auto;
		width: 30%;
  	}
  	.centerContainedOutput
  	{
  		margin: 10px;
  		border: 5px solid #1C5438;
  		padding: 10px;
  		background-color: white;
  		width: 550px;
  		height: 550px;
  		text-align: center;
  	}
  </style>

  <?php
    include_once('../php/default.php');
    defaultHeader();
    //include_once('connect.php');
	$connectDB = connectDB();
	$dateFromRoomID = "SELECT DISTINCT reservationStart
	                       FROM roomreservation
	                       WHERE roomID = $roomNumber";
	$dateCheckResult = $connectDB->query($dateFromRoomID);
	$dateCheckResultArray = $dateCheckResult->fetch_assoc();
	$temp = str_replace(" ","-",$dateCheckResultArray['reservationStart']);
	$explodedDate = explode("-",$temp);

	if($explodedDate[0] != NULL)
	{
		$dbDateFormat= $explodedDate[1]."-".$explodedDate[2]."-".$explodedDate[0];
	}
	$roomTaken = "default";
	if(isset($_GET["submit"]))
	{
		$isTimeTaken = $_GET['time'];
		$brokeDownTime = explode("-",$isTimeTaken);
		if(strcmp($dbDateFormat,$displaydate) == 0)
		{
	  		if($brokeDownTime[0] == $explodedDate[3])
	    		$roomTaken = true;
		}
	}
  ?>
  <body>
  	<div class ="containOutput">
  		<div class="centerContainedOutput">
		    <h1>
		    	<?php
		    		$breakUpTime = explode("-", $timeSlot);
			    	$dataConnect = connectDB();
			    	$dbDateStart = $dbDate." ".$breakUpTime[0];
			    	$dbDateEnd = $dbDate." ".$breakUpTime[1];
			    	$checkEmail = "SELECT COUNT(1)
			    					FROM user
			    					WHERE email = \"$email\"";
			    	$emailResult = $dataConnect->query($checkEmail);
			    	$emailResultArr = $emailResult->fetch_assoc();
			    	
			    	$checkUserID = "SELECT COUNT(1)
			    				  FROM user
			    				  WHERE email = \"$email\" ";
			    	$checkUserIDResult = $dataConnect->query($checkUserID);
			    	$checkUserIDArray = $checkUserIDResult->fetch_assoc();
			    	$idExists = false;
			    	if($checkUserIDArray['COUNT(1)'] == 1)
			    	{
			    		$idExists = true;
			    	}

			    	$getUserID = "SELECT userID
			    				  FROM user
			    				  WHERE email = \"$email\"";
			    	$getUserIDResult = $dataConnect->query($getUserID);
			    	$getUserIDArray = $getUserIDResult->fetch_assoc();
			    	$userID = $getUserIDArray['userID'];
			    	
			    	
					if($emailResultArr['COUNT(1)'] == 1 && $roomTaken != true)
					{
						if($nullEntryPresent != true)
						{
							if($idExists == true)
							{
							echo "You, $firstName $lastName, have a reservation at $timeSlot on $displaydate\n";
							echo "for a $room";
							echo "<br>";
	
								$insertReservationQ = "INSERT INTO `roomreservation`(`roomID`, `reservationStart`, `reservationEnd`, `userID`) VALUES ($roomNumber,'$dbDateStart','$dbDateEnd',$userID)";
								$dataConnect->query($insertReservationQ);
							}
						}
						else
						{
							echo "Please ensure all forms are filled out!";
						}
							echo "<br>";
							echo "Thank you!";
						}
					else if($roomTaken == true)
					{
						echo "The Room is already reserved at the time you selected, please select another time.";
					}
					else
					{
						echo "Account not found. Check email and resubmit";
					}
				    ?>
		    	<form action="roomDisplay.php">
		    		<input style = "margin: 10vh; border: 1px solid black;" type="submit" value="Back to form">
		    	</form>
	    	</h1>
    	</div>
    </div>
  </body>
</html>