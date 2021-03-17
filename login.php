<?php
  session_start();
    if(isset($_SESSION['login']))
    {
      header('Location:'.$_SESSION['login'].".php");
    }
    elseif(isset($_SESSION['message']))
    { 
      echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
      header('Refresh:0');
      session_destroy();
    }
    elseif(isset($_SESSION['error']))
    {
      echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>';
      header('Refresh:0');
      session_destroy();
    }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN </title>
	<link rel="stylesheet" type="text/css" href="css/design.css"> 
	<script type="text/javascript">
    function validateform(){
      var username = document.myform.username.value;
      var password = document.myform.password.value;
      if(username == "username" && password=="password"){
        alert("login Success!");
      }
      else if (username==null || username==""){  
        alert('Username or password cannot be empty!');
      }else if (password.length<7){
        alert('Password must be at least 3 characters long.');
      }
      else{
        alert("Invalid Credentials !");
      }


    }
  	</script>
</head>

<body>
	<center>
			<br>
			<center>
        <p id="title">Missing Person Information Management System</p>
			<div id="main">
				
				<form id="logform" method="POST" action="check_login.php">
          <div id="log"><br><strong><h1>Login as Administrator</h1></strong></div>
					<br>
					<h1><input type="text" required name="username" class="text" autocomplete="off" placeholder="U s e r n a m e"></h1>
					<h1><input type="password" required name="password" class="text" autocomplete="off"  placeholder="P a s s w o r d"></h1>
					<div id="logbtn"><button type="submit" id="btn" name="login" onclick="validateform()">Login</button></div>
				
				</form>
			</div>
			</center>
		
	</center>
</body>
</html>

