<?php
require_once("../php/connect.php");
include_once("../php/default.php");
//include_once('../php/checksession.php');					//currently commented out due to not having access to checksession
defaultHeader();
defaultBody();
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
	  margin: auto;
	}
	.containOutput
	{
	  margin: auto;
	  width: 30%;
	}
	.centerContainedOutput
	{
	  margin: 1vh;
	  border: 5px solid #1C5438;
	  padding: 10px;
	  background-color: white;
	  width: 550px;
	  height: auto;
	  text-align: center;
	}
</style>
<body>
	<div class="centerForm">
		<button class="buttonWidth" onclick="location.href='./accountCreation.php'">New Account</button>
	</div>
	
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

						echo "
							<table style=\"width:100%;\">
								<tr>
									<th>User ID</th>
									<th>Email</th>
									<th>Position</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Manage</th>
									<th>Multi Select</th>
								</tr>
						";

						for($i=0; $i < sizeof($userID); $i++)
						{
							echo"
	                      <tr style=\"text-align:center\">
	                        <form action=\"\">

	                          <td>$userID[$i]</td>

	                          <td>$userEmail[$i]</td>

	                          <td>$userPosition[$i]</td>

	                          <td>$fName[$i]</td>

	                          <td>$lName[$i]</td>

	                          <td><input type=\"submit\" name=\"accountManage\" value=\"Select\"></td>

	                          <td><input type=\"checkbox\" id=\"$userID[$i]\" name=\"userID[$i]\"><td>

	                          <input type=\"hidden\" id=\"userID\" name=\"userID\"value =\"$userID[$i]\">

	                          <input type=\"hidden\" id=\"userEmail\" name=\"userEmail\"value =\"$userEmail[$i]\">

	                          <input type=\"hidden\" id=\"userPosition\" name=\"userPosition\"value =\"$userPosition[$i]\">

	                          <input type=\"hidden\" id=\"fName\" name=\"fName\"value =\"$fName[$i]\">

	                          <input type=\"hidden\" id=\"lName\" name=\"lName\"value =\"$lName[$i]\">
	                        </form>
	                      </tr>";
						}
					}
				?>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>