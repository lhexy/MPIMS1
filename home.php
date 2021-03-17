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
	if (isset($_POST['report'])) {
		session_destroy();
		header('Location:report.php');
	}
	if (isset($_POST['about'])) {
		session_destroy();
		header('Location:about.php');
	}
	if (isset($_POST['home'])) {
		session_destroy();
		header('Location:home.php');
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Missing Person Information Management System</title>
	<link rel="stylesheet" type="text/css" href="css/design.css">
	<script type="text/javascript">;
		function permission(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:view_records.php');
			} 
			else{
				alert('Access denied!')
				window.open('home.php');
			}
		}
		function permit_search(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:search.php');
			} 
			else{
				alert('Access denied!')
				window.open('home.php');
			}
		}
	</script>
	<style type="text/css">
		input:hover{
			background-color: lightblue;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div id="header"><br>
		<form accept="#" method="post">
			<div id="nav"><input type="submit" name="logout" value="Logout"></div>
			<div id="nav"><input type="submit" name="view" onclick="permission()" value="Records"></div>
			<div id="nav"><input type="submit" name="about" value="About Us"></div>
			<div id="nav"><input type="submit" name="report" value="Report"></div>
			<div id="nav"><input type="submit" name="home" value="Home"></div>
		</form>
		<form action="search.php" method="GET">
            <b>Search Record:</b><input type="text" class="input_box" name="search_text">
            <a href="search.php"><input type="submit" placeholder="firstname" name="search" onclick="permit_search()" value="GO" class="go_btn"></a>
        </form>
	</div>
	<center>
	<div id="content">
		<br>
		<img id="logo" src="./images/FINAL.png"><br>
			<h1 style="color:white; font-family: Castellar;">Missing Person <br> Information Management System</h1>
	</div>
	</center>
<hr>
	<div id="footer">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
	</div>
</body>
</html>