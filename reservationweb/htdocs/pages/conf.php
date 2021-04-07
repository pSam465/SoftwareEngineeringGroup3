<?php
	require_once('../php/default.php');
	require_once('../php/checksession.php');
	defaultHeader();
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/default.css">
	
	<title>Confirmation</title>
</head>
<style type = "text/css">
	body
	{
		background-color: #1C4F9C;
	}
	.whiteBG
	{
		background-color: white;
	}
</style>
<body>
	<div class="body">

		<?php
			var_dump($_POST);
		?>
	</div>
</body>
</html>
