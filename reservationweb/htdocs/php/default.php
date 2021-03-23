<?php
	function defaultHeader()
	{
		echo<<<_END
		<style>
		header
		{
			background-color:#1C5438;
			width: 100%;
			margin: 0;
			padding:0;
		}
		div
		{
			padding: 1vh;
		}
		</style>
		<header>
			<div class="d-flex justify-content-center">
			<a href="../index.php"> <img src="../images/schoolLogo.jpg" alt="GCSU logo" width="300" height="110"> </a>
			</div>
		</header>
		_END;
	}
	function defaultBody()
	{
		echo "
		<style>
			body
			{
				background-color:#1C4F9C;
			}
		</style>
		";
	}
?>