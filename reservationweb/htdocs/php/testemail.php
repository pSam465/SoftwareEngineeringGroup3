<?php
	$address = "trentbrownlee@gmail.com";
	$message = "test";
	$subject = "test";
	$from = "From: reservations@irissoln.com";
	if(mail($address,$subject,$message,$from))
	{
		echo "mail sent";
	}
	else
	{
		echo "mail failed";
	}
?>