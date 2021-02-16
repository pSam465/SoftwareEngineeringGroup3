<?php
	include_once ("connect.php");

	$nullEntryPresent = false;
	$firstName =NULL;
	$lastName =NULL ;
	$email=NULL;
	$timeSlot=NULL;
	$room = "Room Test";
	if(isset($_GET['submit']))
	{
		$firstName = $_GET['firstName'];
		$lastName = $_GET['lastName'];
		$email = $_GET['emailAddress'];
		$timeSlot =  $_GET['time'];
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
  </style>
  <body>
    <h1>
    	<?php
	    	if($nullEntryPresent != true)
	    	{
		    	echo "You, $firstName $lastName, have a reservation at $timeSlot\n";
		    	echo "for a $room";
		    }
		    else
		    {
		    	echo "Please ensure all forms are filled out!";
		    }

		    $connect = connectDB();
			
	    $insertUserData = "INSERT INTO userdata (firstName,lastName,email,time) VALUES ('$firstName','$lastName','$email','$timeSlot')";

		if($connect->query($insertUserData) == TRUE)
		{
			echo "DATA inserted";
		}
		else
		{
			echo "data insertion failed";
			echo "<br>";
			echo "Error: " .$insertUserData."<br>".$connect->error;
		}
    	?>




    	<form action="roomRes.php">
    		<input type="submit" value="Back to form">
    	</form>
    </h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>