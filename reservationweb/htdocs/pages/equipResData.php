<?php
	include_once ('../php/connect.php');
   	require_once('../php/checksession.php');
	include_once('../php/default.php');
    defaultHeader();

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
		$equip = $_GET['equip'];
		$displaydate = $_GET['date'];
		$dbDate = $_GET['hiddenDate'];
		$equipNumber = $_GET['dataEquipNum'];
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
    <link rel="stylesheet" type="text/css" href="../css/default.css">
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
	$dateFromEquipID = "SELECT DISTINCT reservationStart
	                       FROM equipreservation
	                       WHERE equipID = $equipNumber";
	$dateCheckResult = $connectDB->query($dateFromEquipID);
	$dateCheckResultArray = $dateCheckResult->fetch_assoc();
	$temp = str_replace(" ","-",$dateCheckResultArray['reservationStart']);
	$explodedDate = explode("-",$temp);

	if($explodedDate[0] != NULL)
	{
		$dbDateFormat= $explodedDate[1]."-".$explodedDate[2]."-".$explodedDate[0];
	}
	else
	{
		$dbDateFormat = "no time in DB";
	}
	$equipTaken = false;
	if(isset($_GET["submit"]) && $dbDateFormat[0] != NULL)
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
			    	
			    	
					if($emailResultArr['COUNT(1)'] == 1 && $equipTaken != true)
					{
						if($nullEntryPresent != true)
						{
							if($idExists == true)
							{
							echo "You, $firstName $lastName, have a reservation at $timeSlot on $displaydate\n";
							echo "for a $equipment";
							echo "<br>";
	
								$insertReservationQ = "INSERT INTO `equipreservation`(`equipID`, `reservationStart`, `reservationEnd`, `userID`) VALUES ($equipNumber,'$dbDateStart','$dbDateEnd',$userID)";
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
						echo "The Equipment is already reserved at the time you selected, please select another time.";
					}
					else
					{
						echo "Account not found. Check email and resubmit";
					}
				    ?>
		    	<form action="equipDisplay.php">
		    		<input style = "margin: 10vh; border: 1px solid black;" type="submit" value="Back to form">
		    	</form>
	    	</h1>
    	</div>
    </div>
  </body>
</html>

<?php
	function sendEmail($sendTo)
	{
		mail($sendTo,"Test","testing");
	}
?>