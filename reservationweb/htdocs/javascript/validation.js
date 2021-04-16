function validatereservation(form)
{
	var resDate = document.getElementById("date");
	var stime = document.getElementById("starttime");
	var etime = document.getElementById("endtime");

	//Set the values of the submission
	document.getElementById("datesubmit").value = resDate.value;
	document.getElementById("starttimesubmit").value = stime.value;
	document.getElementById("endtimesubmit").value = etime.value;

	if(validatetimes(stime, etime) && validatedate(resDate))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validatetimes(sid, eid)
{
	var stime = sid.value;
	var etime = eid.value;
	var message = document.getElementById("timemsg");

	var isValid = false;

	if(stime == "" || etime == "")
	{
		message.innerHTML = "Times must be filled out"
		return false;
	}
	else if(stime >= etime)
	{
		message.innerHTML = "Start time must occur before the end time";
		return false;
	}
	else
	{
		message.innerHTML = ""
		isValid = true;
	}

	return isValid;
}

function validatedate(id)
{
	var res = id.value;
	var message = document.getElementById("datemsg");

	var dateParts = res.split("-");
	var year = dateParts[0];
	var month = dateParts[1];
	var day = dateParts[2];

	var resDate = new Date(res+"T00:00:00");
	var currentDate = new Date();

	if(res == "")
	{
		message.innerHTML = "Date must be filled out";
		return false;
	}
	else if(currentDate.getTime() > resDate.getTime())
	{
		message.innerHTML = "Reservation date must be past the current date";
		return false;
	}
	else
	{
		message.innerHTML = "";
		return true;
	}

	return true;
}