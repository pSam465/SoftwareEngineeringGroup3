<?php 
	function connectDB()
	{
		$host = "localhost";
		$user = "semanager";
		$password = "semanager";
		$dbName = "setestdb";
		$connect = new mysqli($host,$user,$password,$dbName);
		 if($connect -> connect_error) die("Fatal error connecting to database");
			return $connect;
	}
?>