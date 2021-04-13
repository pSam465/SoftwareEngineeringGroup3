function validatereservation(form)
{
	var stime = document.getElementById("starttime");
	var etime = document.getElementById("endtime");
	
	var resDate = document.getElementById("date")

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

	message.innerHTML = "start: " + stime + " end: " + etime;
	
	return false;
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