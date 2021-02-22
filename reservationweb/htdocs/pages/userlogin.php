<?php
require_once("../php/sqlSts.php");
$email = $password = $error = "";

$errEmail = "Please enter an email";
$errFormat = "Invalid email format";
$errPassword = "Please enter a password";
$errInvalid = "Username and password do not match";

function clean_input(&$input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
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

if(empty($_POST['email']))
{
	$error = $errEmail;
}	
else if(empty($_POST['password']))
{
	$error = $errPassword;
}
else
{
	$email = $_POST['email'];
	check_email($email);
	$password = $_POST['password'];

	//Verify email
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
		<form method="POST" action="../php/loginHandler.php" autocomplete="off" />
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
			<div class="error-message m-2">
				<?php echo $error ?>
			</div>
			<input type="submit" class="btn btn-primary btn-block p-2" value="login" />
		</form>
		</div>
	</div>
</body>
</html>