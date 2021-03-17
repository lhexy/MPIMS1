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
	if (isset($_POST['home'])) {
		session_destroy();
		header('Location:home.php');
	}
	
	if (isset($_POST['insert_record'])) {
		
		if($_FILES['Image']['size'] > 0){
			$uploadFolder = 'pic_record/';
			$filename = $_FILES['Image']['name'];

			$uploadStatus =	move_uploaded_file($_FILES['Image']['tmp_name'],$uploadFolder.$filename);
			if($uploadStatus){
				$Lastname=$_POST['Lastname'];
				$Firstname=$_POST['Firstname'];
				$Middlename=$_POST['Middlename'];
				$Age=$_POST['Age'];
				$SMT=$_POST['SMT'];
				$Known_aliases=$_POST['Known_aliases'];
				$Hair_color=$_POST['Hair_color'];
				$Blood_type=$_POST['Blood_type'];
				$Clothing_Description=$_POST['Clothing_description'];
				$Social_media_accounts=$_POST['Social_media_accounts'];
				$Birth_defect=$_POST['Birth_defect'];
				$Date_of_disappearance=date('Y-m-d');
				$Date_of_reporting=date('Y-m-d');

				$Database="INSERT INTO tbl_records(Lastname,Firstname,Middlename,Age,SMT,Known_aliases,Hair_color,Blood_type,Clothing_description,Social_media_accounts,Birth_defect,Image,Date_of_disappearance,Date_of_reporting)VALUES('$Lastname','$Firstname','$Middlename','$Age','$SMT','$Known_aliases','$Hair_color','$Blood_type','$Clothing_Description', '$Social_media_accounts','$Birth_defect','$filename','$Date_of_disappearance','$Date_of_reporting')";
				if(mysqli_query($connectivity,$Database)){
					echo '<script type="text/javascript">alert("Data was successfully recorded!");</script>';	
				}
				else{
					echo '<script type="text/javascript">alert("!! May be SQL query wrong");</script>';
				}
			}
			else{
				echo "Choose a picture to upload!!!";
			}
		}
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
				window.open('report.php');
			}
		}
		function permit_search(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:search.php');
			} 
			else{
				alert('Access denied!')
				window.open('report.php');
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
        <a href="search.php"><input type="submit" name="search" onclick="permit_search()" value="GO" class="go_btn"></a>
    </form>
	</div>
	<center>
	<div id="content"><br>
		<h1 style="color: white">Input New Record</h1>
		<center>
		<div id="main">
			<center>
				<form id="editform" method="POST"enctype="multipart/form-data">
				<table style="border-collapse: collapse; border-color: white; font-size: 15px; color: white;" border="1">
					<tr>
						<th colspan="4"><h2>Missing Person Details</h2></th>

					</tr>
					<tr>
						<td>
							<strong>Lastname:</strong>
						</td>
						<td>
							<input type="text" name="Lastname" class="reporttext" required placeholder="lastname">
						</td>
						<td >
							<strong>Image: </strong>
						</td>
						<td>
							<input type="file" class="reporttext" name="Image" required placeholder="Image">
						</td>
					</tr>
					<tr>
						<td>
							<strong>Firstname:</strong>
						</td>
						<td>
							<input type="text" name="Firstname" class="reporttext" required placeholder="Firstname">
						</td>
						<td>
							<strong>Birth Defect:</strong>
						</td>
						<td>
							<input type="text" name="Birth_defect" class="reporttext" required placeholder="Birth defect">
						</td>
					</tr>
					<tr>
						<td>
							<strong>Middle name:</strong>
						</td>
						<td> 
							<input type="text" name="Middlename" class="reporttext" required placeholder="middle name">
						</td>
						<td>
							<strong>Social Media Accounts:</strong>
						</td>
						<td>
							<input type="text" name="Social_media_accounts" class="reporttext" required placeholder="Social media Accounts">
						</td>
					</tr>
					<tr>
						<td>
							<strong>Age:</strong>
						</td>
						<td>
							<input type="Number" name="Age" class="reporttext" required placeholder="Age">
						</td>
						<td>
							<strong>Clothing Description:</strong>
						</td>
						<td>
							<input type="text" name="Clothing_description" class="reporttext" required placeholder="Clothing_description">
						</td>
					</tr>
					<tr>
						<td>
							<strong>SMT:</strong>
						</td>
						<td>
							<input type="text" name="SMT" class="reporttext" required placeholder="SMT">
						</td>
						<td>
							<strong>Date of disappearance: </strong>
						</td>
						<td>
							<input type="text" name="Date_of_disappearance" class="reporttext" autocomplete="off" required placeholder="yyyy-mm-dd"><br>
						</td>
					</tr>
					<td>
							<strong>Known Aliases:</strong>
						</td>
						<td>
							<input type="text" name="Known_aliases" class="reporttext" required placeholder="Aliases">
						</td>
						<td>
							<strong>Date of reporting:</strong>
						</td> 
						<td>
							<input type="text" name="Date_of_reporting" class="reporttext" autocomplete="off" required placeholder="yyyy-mm-dd"><br>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Hair Color:</strong>
						</td>
						<td>
							<input type="text" name="Hair_color" class="reporttext" required placeholder="Haircolor">
						</td>
						<td>
							<strong>Bloodtype:</strong>
						</td>
						<td>
							<input type="text" name="Blood_type" class="reporttext" required placeholder="Blood_type">
						</td>
					</tr>
				</table>

				<br><input class="sub_btn" type="submit" name="insert_record" value="Submit">
			</form>
			</center>
		</div>
	</center>
	</div>
</center>
	<hr>
	<div id="footer">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
	</div>
</body>
</html>