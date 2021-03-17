<?php
  session_start();
	$username=$_POST["username"];
	$password=$_POST["password"];

		if ($username == "username" && $password == "password") {
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['login']=$login;
			header('Location:home.php');
			exit();
		}
		else {
			header('Location:login.php');
			exit();
		}
?>