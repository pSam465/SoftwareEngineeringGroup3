<?php
require_once("../php/connect.php");
include_once('../php/checksession.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Management</title>
</head>
<style>
	.buttonWidth
	{
		width:250px;
	}
	.centerForm
	{
	  text-align: center;
	}
	.containOutput
	{
	  margin: auto;
	  width: 30%;
	}
	.centerContainedOutput
	{
	  margin-left: -15vw;
	  border: 5px solid #1C5438;
	  background-color: white;
	  width: 50vw;
	  height: auto;
	  text-align: center;
	}
	.movethebutton
	{
		top:10vh;
		margin-top: 1vh;
	}
	
</style>
<body>
	<div class="centerForm">
		<div class="containOutput">
			<div class="centerContainedOutput">
				<?php
					include_once("../php/connect.php");
					$conn = connectDB();
					$query = "SELECT `userID`,`email`,`position`,`fName`,`lName` FROM `user`";
					$result = $conn->query($query);
					if(!$result)
					{
						echo "Error with query";
						die("Fatal error");
						echo "<br>";
					}
					else
					{
						$userID = array();
						$userEmail = array();
						$userPosition = array();
						$fName = array();
						$lName = array();
						
						$numRowsQuery = $conn->query("SELECT COUNT(*) FROM user");
						$numRowsArr = $numRowsQuery->fetch_assoc();
						$numRows = $numRowsArr['COUNT(*)'];
						for($i = 0; $i < $numRows; $i++)
						{
							$row = $result->fetch_assoc();
							array_push($userID, $row["userID"]);
							array_push($userEmail, $row["email"]);
							array_push($userPosition, $row["position"]);
							array_push($fName, $row["fName"]);
							array_push($lName, $row["lName"]);
						}

						echo '<input type="text" type="form-control" name="roomsearch" id="searchbar" placeholder="Search for a user by email" style="width: 100%;" onkeyup="searchtable(1)">';
						echo "
							<table id=filtertable style=\"width:100%;\">
								<tr>
									<th>User ID</th>
									<th>Email</th>
									<th>Position</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Select</th>
								</tr>
						";

						for($i=0; $i < sizeof($userID); $i++)
						{
							echo"
							<tr style=\"text-align:center\">
							<form action=\"./accDeletion.php\" method = \"post\">

								<td>$userID[$i]</td>

								<td>$userEmail[$i]</td>

								<td>$userPosition[$i]</td>

								<td>$fName[$i]</td>

								<td>$lName[$i]</td>

								<td><input type=\"checkbox\" value=\"$userID[$i]\" name=\"idInput[]\"><td>

								<input type=\"hidden\" id=\"userID\" name=\"userID\"value =\"$userID[$i]\">

								<input type=\"hidden\" id=\"userEmail\" name=\"userEmail\"value =\"$userEmail[$i]\">

								<input type=\"hidden\" id=\"userPosition\" name=\"userPosition\"value =\"$userPosition[$i]\">

								<input type=\"hidden\" id=\"fName\" name=\"fName\"value =\"$fName[$i]\">

								<input type=\"hidden\" id=\"lName\" name=\"lName\"value =\"$lName[$i]\">
							</tr>
					  	";
						}
						
					}
				?>
			</div>
		</div>
	</div>
</table>
	<input type="submit" class="movethebutton" onclick= "location.href='./accDeletion.php'" value= "Delete selected Accounts" name ="formSubmit">
	</form>

</body>

</html>