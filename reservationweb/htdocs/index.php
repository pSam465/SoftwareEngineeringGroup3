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
    	<div class="container-fluid">
    		
  			<div class="row align-items-center">
    			<div class="col-4 " >
    				<button type="button" class="btn btn-default btn-lg btn-block" onclick="document.location='./pages/roomAval.php'">Reserve a Room</button>
    				<button type="button" class="btn btn-default btn-lg btn-block" onclick="document.location='./pages/equipAval.php'">Reserve Equipment</button>
          </div>
    			<div class="col-4 ">
    				<button type="button" class="btn btn-default btn-lg btn-block" onclick="document.location='./pages/userInfo.php'">Account Details</button>
    			</div>
          <div class="col-4 ">
            <button type="button" class="btn btn-default btn-lg btn-block" onclick="document.location='./pages/pastResViews.php'">View Past Reservations</button>
            <button type="button" class="btn btn-default btn-lg btn-block" onclick="document.location='./pages/userCancelRes.php'">Cancel a Reservation</button>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <?php
          if(!isset($_SESSION['valid']))
          {
            echo "<button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"document.location='./pages/userlogin.php'\">Log In</button>";
          }
          else
          {
            echo "<button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"document.location='./php/logout.php'\">Log Out</button>";
          }
        	
          ?>
          <button type="button" class="btn btn-primary btn-xs" onclick="document.location='./pages/admincontrols.php'">Admin Page</button>
        </div>
      </div>
    </div>
  </footer>
</html>
