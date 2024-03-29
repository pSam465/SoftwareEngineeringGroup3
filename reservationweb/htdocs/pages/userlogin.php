<?php
session_start();
require_once("../php/connect.php");

if(isset($_SESSION['valid']))
{
	header("Location:../index.php");
}

$email = $password = $error = "";

$errEmail = "Please enter an email";
$errFormat = "Invalid email format";
$errPassword = "Please enter a password";
$errInvalid = "Username and password do not match";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['email']))
	{
		$error = $errEmail;
	}	
	else if(empty($_POST['password']))
	{
		$email = clean_input($_POST['email']);
		$error = $errPassword;
	}
	else
	{
		$email = clean_input($_POST['email']);
		$password = clean_input($_POST['password']);

		check_email($email);
	}

	if(empty($error))
	{
		$conn = connectDB();
		if(!$conn)
		{
			exit("Unable to connect to DB");
		}
		$query = "SELECT salt FROM user WHERE email='$email'";
		$result = $conn->query($query);
		if(!$result) die("Error on login. Try again.");
		if($result->num_rows>0)
		{
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$saltedPass = $password.$row['salt'];

			$query = "SELECT * FROM user WHERE email='$email' AND password=SHA1('{$saltedPass}')";
			$result = $conn->query($query);
			if(!$result) die("Error on login. Try again.");
			if(($result->num_rows)>0)
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$_SESSION['valid'] = true;
				$_SESSION['email'] = $row['email'];
				$_SESSION['uid'] = $row['userID'];

				$result = $conn->query($query);
				if($row['position'] == "admin")
				{
					header("Location: ../pages/admincontrols.php");
				}
				else
				{
					header("Location: ../index.php");
				}

				$conn->close();
			}
		}
		else
		{
			$error = $errInvalid;
		}
	}
}

function clean_input($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);

	return $input;
}

function check_email($email)
{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{		
		global $errFormat;
		global $error;
		$error = $errFormat;
	}
}

?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrapcss/bootstrap.min.css">
	<link rel="stylesheet" href="../css/login.css">
	<title>User Login</title>
</head>
<body>
	<div class="d-flex justify-content-center">
		<div class="login-box">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" />
			<div>
				<h3>Please login to access the site</h3>
			</div>
			<div class="form-group">
				<div class="float-left">
					<label for="email" class="form-label">email</label>
				</div>		
					<input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $email ?>" />
			</div>		
			<div class="form-group">
				<div class="float-left">
					<label for="password">password</label>
				</div>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
			</div>
			<?php
			if(!empty($error))
			{
				echo "<div class=\"error-message m-2\">";
				echo $error;
				echo "</div>";
			}
			?>
			<input type="submit" class="btn btn-primary btn-block p-2" value="login" />
		</form>
		</div>
	</div>
</body>
</html>