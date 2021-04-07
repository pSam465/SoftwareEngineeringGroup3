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
		<div class="row content-block">
			<nav>
				Links
				<button onclick ="loadcontent()">Test</button>
			</nav>
		</div>
		<div class="row" id="subnav">
			<div class="col col-sm-2 content-block">
				Sub Links
				Sub Links
				Sub Links
				Sub Links
			</div>
			<div class="col content-block">
				<div id="content-display">
					
				</div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
function updatesubnav()
{
	var subnav = document.getElementById("subnav");
}

function loadcontent()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("content-display").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "../pages/roomaval.php", true);
	xhttp.send();
}
</script>

</html>