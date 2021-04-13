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

	if(stime >= etime)
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

	var resDate = new Date(res);
	var currentDate = new Date();
	
	var currentUTC = new Date(currentDate.toUTCString())
	var resUTC = new Date(resDate.toUTCString());

	if(res == "")
	{
		message.innerHTML = "Date must be filled out";
		return false;
	}
	else if(currentUTC.getTime() > resUTC.getTime())
	{
		message.innerHTML = currentDate.toString() + resDate.toString();
		message.innerHTML += "Current time: "+currentUTC.getTime()+" Res time: "+resUTC.getTime();
		//message.innerHTML = "Reservation date must be past the current date";
		return false;
	}
	else
	{
		message.innerHTML = "";
		return true;
	}

	//message.innerHTML = currentUTC.toString();
	//message.innerHTML += resUTC.toUTCString();

	return true;
}