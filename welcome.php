<?php
	require('db_connect.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:login.php');
	}
	if (isset($_POST['view'])) {
		session_destroy();
		header('Location:view_records.php');
	}
	if (isset($_POST['about'])) {
		session_destroy();
		header('Location:about.php');
	}
	if (isset($_POST['report'])) {
		session_destroy();
		header('Location:report.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Missing Person Information Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="header"><br>
		<form accept="#" method="post">
			<div id="nav"><input type="submit" name="logout" value="Logout"></div>
			<div id="nav"><input type="submit" name="view" value="View Records"></div>
			<div id="nav"><input type="submit" name="about" value="About Us"></div>
			<div id="nav"><input type="submit" name="report" value="Report"></div>
		</form>
	</div>
	<div id="welcome">
		This page will help you to find your lost loved ones. <a href="search.php"> >>Click here </a>
	</div>
	<div id="footer">
		Contact Us
	</div>
</body>
</html>