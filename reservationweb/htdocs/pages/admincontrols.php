<?php
include_once('../php/default.php');
require_once('../php/checksession.php');
require_once("../php/connect.php");
defaultHeader();
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/reserve.css">
	
	<title>Admin Controls</title>
</head>
<body>
	<div class="container-fluid ">
		<div class="row" id="subnav md">
			<div class="col-md-2 content-block">
				<h5 class="links" style="cursor: pointer;">Reservation Management</h5>
				<div class="hideable">
					<p onclick="loadcontent('../pages/removeres.php')" style="cursor: pointer;">Remove Reservations</p>
				</div>
				<h5 class="links" style="cursor: pointer;">User Management</h5>
				<div class="hideable">
					<p onclick="loadcontent('../pages/roomaval.php')" style="cursor: pointer;">Sub Links</p>
					<p onclick="loadcontent('../pages/removeres.php')" style="cursor: pointer;">Sub Links</p>
				</div>
				<h5 class="links" style="cursor: pointer;">Room Management</h5>
				<div class="hideable">
					<p onclick="loadcontent('../pages/roomlist.php')" style="cursor: pointer;">Change Room Info</p>
				</div>
			</div>
			<div class="col-md content-block">
				<div id="content-display">
					
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".links").on("click", function(){
		$(this).next().toggle(400);
	});
});
</script>

<script type="text/javascript">
function loadcontent(url)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("content-display").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();
}
</script>

</html>