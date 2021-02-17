<?php

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
		echo "$errFormat";
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
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" />
			<div>
				<h3>Please login to access the site</h3>
			</div>
			<div>
				<div>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="<?php echo $email ?>" />
				</div>
				<div>
					<label for="password">password</label>
					<input type="password" id="password" name="password" value="<?php echo $password?>" / >
				</div>
			</div>
			<input type="submit" value="login" />
			<br />
			<?php echo $error ?>
		</form>
		</div>
	</div>
</body>
</html>