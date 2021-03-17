
<?php
	require('db_connect.php');

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
	if (isset($_POST['search'])) {
		session_destroy();
		header('Location:search.php');
	}
	if (isset($_POST['home'])) {
		session_destroy();
		header('Location:home.php');
	}

	if (isset($_POST['Case_number'])) {

		$Case_number=$_POST['Case_number'];
		$Lastname=$_POST['Lastname'];
		$Firstname=$_POST['Firstname'];
		$Middlename=$_POST['Middlename'];
		$Age=$_POST['Age'];
		$SMT=$_POST['SMT'];
		$Known_aliases=$_POST['Known_aliases'];
		$Hair_color=$_POST['Hair_color'];
		$Blood_type=$_POST['Blood_type'];
		$Clothing_description=$_POST['Clothing_description'];
		$Social_media_accounts=$_POST['Social_media_accounts'];
		$Birth_defect=$_POST['Birth_defect'];
		$Image=$_POST['Image'];
		$Date_of_disappearance=mysqli_real_escape_string($connectivity,$_POST['Date_of_disappearance']);
		$Date_of_reporting=mysqli_real_escape_string($connectivity,$_POST['Date_of_reporting']);

			
		$sql="UPDATE tbl_records SET Lastname='$Lastname',Firstname='$Firstname',Middlename='$Middlename',Age='$Age',SMT='$SMT', Known_aliases='$Known_aliases',Hair_color='$Hair_color',Blood_type='$Blood_type',Clothing_description='$Clothing_description',Social_media_accounts='$Social_media_accounts',Birth_defect=$Birth_defect, Date_of_disappearance=$Date_of_disappearance, Date_of_reporting=$Date_of_reporting  WHERE Case_number='$Case_number' ";

		if(mysqli_query($connectivity,$sql)) {

			header('location:view_records.php');
		}
		else{
			mysqli_error($connectivity);
		}

			
	}
	if (isset($_GET['Case_number'])) {
		$Case_number=$_GET['Case_number'];
		$sql="SELECT * FROM tbl_records WHERE Case_number=$Case_number";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
	
		?>
		<link rel="stylesheet" type="text/css" href="css/design.css">
	

		<body >
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

		<b style="font-size: 30px;">Edit Record</b>
		<form id="editform" action="view_records.php" method="POST" >
			<input hidden type="Numberss" name="Case_number" value=<?=$row['Case_number'];?>><br>
				<table style="border-collapse: collapse; border-color: white; font-size: 15px; color: white;" border="1">
					<tr>
						<th colspan="4" style="font-size: 40px;">Missing Person Details</th>

					</tr>
					<tr>
						<td>
							<strong>Lastname:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Lastname" value=<?=$row['Lastname'];?>>
						</td>
						<td >
							<strong>Image: </strong>
						</td>
						<td>
							<input required class="reporttext" type="file" name="Image" value=<?=$row['Image'];?>>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Firstname:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Firstname" value=<?=$row['Firstname'];?>>
						</td>
						<td>
							<strong>Birth Defect:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Birth_defect" value=<?=$row['Birth_defect'];?>>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Middle name:</strong>
						</td>
						<td> 
							<input required class="reporttext" type="text" name="Middlename" value=<?=$row['Middlename'];?>>
						</td>
						<td>
							<strong>Social Media Accounts:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Social_media_accounts" value=<?=$row['Social_media_accounts'];?>>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Age:</strong>
						</td>
						<td>
							<input required class="reporttext" type="Number" name="Age" value=<?=$row['Age'];?>>
						</td>
						<td>
							<strong>Clothing Description:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Clothing_description" value=<?=$row['Clothing_description'];?>>
						</td>
					</tr>
					<tr>
						<td>
							<strong>SMT:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="SMT" value=<?=$row['SMT'];?>>
						</td>
						<td>
							<strong>Date of disappearance: </strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Date_of_disappearance" value=<?=$row['Date_of_disappearance'];?>><br>
						</td>
					</tr>
					<td>
							<strong>Known Aliases:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Known_aliases" value=<?=$row['Known_aliases'];?>>
						</td>
						<td>
							<strong>Date of reporting:</strong>
						</td> 
						<td>
							<input required class="reporttext" type="text" name="Date_of_reporting" value=<?=$row['Date_of_reporting'];?>><br>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Hair Color:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Hair_color" value=<?=$row['Hair_color'];?>>
						</td>
						<td>
							<strong>Bloodtype:</strong>
						</td>
						<td>
							<input required class="reporttext" type="text" name="Blood_type" value=<?=$row['Blood_type'];?>>
						</td>
					</tr>
				</table>

				<br><input class="sub_btn" type="submit" name="submit" value="Submit">
			</form>
		</center>
		</body>
		<?php
		}
?>



<hr>
	<div id="footer">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
	</div>

</body>
</html>