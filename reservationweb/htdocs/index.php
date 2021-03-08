<?php
require_once("./php/checksession.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home</title>
  	</head>
  	<body style="background-color:#1C4F9C;">
		<?php
    		require_once './php/default.php';
    		defaultHeader();

    	?>
		<br> <br> <br>
    	<div class="container">
    		
  			<div class="row align-items-center">
    			<div class="col align-self-center">
    				<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="document.location='./pages/roomDisplay.php'">Reservation a Room</button>
    			</div>
    			<div class="w-100"></div>
    			<div class="col align-self-center">
    				<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="document.location='default.asp'">Reservation Equipment</button>
    			<div class="w-100"></div>
    			<div class="col align-self-center">
    				<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="document.location='default.asp'">Account</button>
    			</div>
    		
  			</div>
		</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <footer>
    <?php
    if(!isset($_SESSION['valid']))
    {
      echo "<a href=\"./pages/userlogin.php\">Login</a><br>";
    }
    else
    {
      echo "<a href=\"./php/logout.php\">Logout</a><br>";
    }
  	
    ?>
	<a href="phpmyadmin">PHP Admin</a>
  </footer>
</html>
