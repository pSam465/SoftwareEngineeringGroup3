<?php
require_once("connect.php");
$conn = connectDB();
$rID = $_GET['roomID'];
$rNum = $_GET['roomNum'];
$build = $_GET['building'];
$rType = $_GET['roomType'];
$desc = $_GET['desc'];
$avail = $_GET['avail'];
$query = "UPDATE room SET roomNum=\"$rNum\", building=\"$build\", roomType=\"$rType\", roomDesc=\"$desc\", roomAvailability=\"$avail\" WHERE roomID=\"$rID\";";
$result = $conn->query($query);
if(!$result) die("Error with query");
?>