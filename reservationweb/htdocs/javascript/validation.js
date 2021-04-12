function validatereservation(form)
{

}

function validatetimes(id, id)
{

}

function validatedate(id)
{
	var res = id.value;

	var resDate = new Date(res+"Z");
	var currentDate = new Date();
	
	var message = document.getElementById("datemsg");
	message.innerHTML = currentDate.toUTCString();
	message.innerHTML += resDate.toUTCString();

	return true;
}