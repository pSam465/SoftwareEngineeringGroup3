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
	
	<title>Room Reservation</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md content-block">
				<div class="row">
					<div class="col-sm d-flex justify-content-center">	
						<input type="text" type="form-control" name="roomsearch" id="searchbar" placeholder="Search for a room" style="width: 100%;" onkeyup="searchtable(this)">
					</div>
				</div>
				<div class="row">
					<div class="col-sm d-flex justify-content-center">
					<div class="container scrollable">
						<table class="table table-hover table-fixed selectabletable" id="filtertable">
						</table>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="content-block">
				<div class="row m-0">
					<div class="col d-flex justify-content-center">
						<div class="align-self-center">
							<h3>Select a Date</h3>
						</div>
						<div class="form-group">
							<input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>" onblur="validatedate(this)" />
						</div>
					</div>
				</div>
				<div class="row m-0 p-0">
					<div class="col d-flex justify-content-center">
						<p id="datemsg" class="text-danger"></p>
					</div>
				</div>
				<hr class="rounded">
				<div class="row m-0">
					<div class="col d-flex justify-content-center">
						<div class="align-self-center">
							<h3>Select a Time</h3>
						</div>
						<div class="form-group">	
							Start<input type="time" class="form-control" id="starttime" name="starttime" />
						</div>
						<div class="form-group">
							End<input type="time" class="form-control" id="endtime" name="endtime" />
						</div>
					</div>
				</div>
				<div class="row m-0 p-0">
					<div class="col d-flex justify-content-center">
						<p id="timemsg" class="text-danger"></p>
					</div>
				</div>
				<hr class="rounded">
				<div class="row">
					<div class="col d-flex justify-content-center">
						<button class="btn btn-outline-info btn-lg btn-block" onclick="lookForRooms()">Find a Room</button>
					</div>
				</div>
				</div>
				<form  action="../pages/resdetails.php" method="POST" onsubmit="return validatereservation(this)">
					<div class="row">
						<input hidden name="date" id="datesubmit">
						<input hidden name="starttime" id="starttimesubmit">
						<input hidden name="endtime" id="endtimesubmit">
						<input hidden name="room" id="roomval">
						<div class="col d-flex justify-content-center">
							<button type="submit" id="submitbtn" class="btn btn-primary btn-lg btn-block" disabled>Apply for Room</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/search.js"></script>
<script type="text/javascript" src="../javascript/validation.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".selectabletable").on('click', '.roomInfoBtn', function(event){
		alert($(this).find(".roomInfo").html() + "\n" + $(this).find(".description").html());
	});	

	$(".selectabletable").on('click', '.selectablerow', function(event){
		if($(this).hasClass('table-info'))
		{
			$(this).removeClass('table-info');
			$("#roomval").val(null);
		}
		else
		{
			$(this).addClass('table-info');
			$("#roomval").val($("#roomid", this).html());
		}
		$(this).siblings().removeClass('table-info');
		$("#submitbtn").removeAttr("disabled");
	});
});
</script>

<script type="text/javascript">
function lookForRooms()
{
	if(validatereservation(this))
	{
		updateTable();
	}
}

function updateTable()
{
	var date = document.getElementById("date");
	var starttime = document.getElementById("starttime");
	var endtime = document.getElementById("endtime");

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("filtertable").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", `../php/filltable.php?date=${date.value}&starttime=${starttime.value}&endtime=${endtime.value}&type=room`, true);
	xhttp.send();
}
</script>

</html>