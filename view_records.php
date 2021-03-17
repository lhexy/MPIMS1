<?php
	require('db_connect.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:login.php');
	}
	if (isset($_POST['home'])) {
		session_destroy();
		header('Location:home.php');
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
	<link rel="stylesheet" type="text/css" href="css/design.css">
	<script type="text/javascript">;
		function permit_search(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:search.php');
			} 
			else{
				alert('Access denied!')
				window.open('view_records.php');
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
			<div id="nav"><input type="submit" name="view" value="Records"></div>
			<div id="nav"><input type="submit" name="about" value="About Us"></div>
			<div id="nav"><input type="submit" name="report" value="Report"></div>
			<div id="nav"><input type="submit" name="home" value="Home"></div>
		</form>
		<form action="search.php" method="GET">
            <b>Search Record:</b><input type="text" class="input_box" name="search_text">
            <a href="search.php"><input type="submit" name="search" onclick="permit_search()" value="GO" class="go_btn"></a>
        </form>
	</div>
	<div id="content1">
			<center>
				<h1 style="color: white">Record List</h1>
					<?php
						$sql = "SELECT * FROM tbl_records";
						$result = mysqli_query($connectivity, $sql);

						if (mysqli_num_rows($result)<=0) {
						   echo "No data found";
						}
						else {
							?>
						<div>
							<table style="margin-left: 10px; margin-right: 10px; border-collapse: collapse;" border="1px" >
								<tr>
									<th style="color: yellow;" id="th_id">Case Number</th>
									<th style="color: yellow; ">Lastname</th>
									<th style="color: yellow;">Firstname</th>
									<th style="color: yellow;">Middle name</th>
									<th style="color: yellow;">Age</th>
									<th style="color: yellow;">SMT</th>
									<th style="color: yellow;">Known Aliases</th>
									<th style="color: yellow;">Hair Color</th>
									<th style="color: yellow;">Bloodtype</th>
									<th style="color: yellow;">Clothing Descriptions</th>
									<th style="color: yellow;">Social Media Accounts</th>
									<th style="color: yellow;">Birth Defects</th>
									<th style="color: yellow;">Image</th>
									<th style="color: yellow;">Date of Disappearance</th>
									<th style="color: yellow;">Date of Reporting</th>
									<th style="color: yellow;" colspan="2">Action</th>
								</tr>
								
							<?php
								while ($row=mysqli_fetch_assoc($result)) {
							?>
								<tr style="color: white; text-align: center;">
									<td><?=$row['Case_number'];?></td>
									<td><?=$row['Lastname'];?></td>
									<td><?=$row['Firstname'];?></td>
									<td><?=$row['Middlename'];?></td>
									<td><?=$row['Age'];?></td>
									<td><?=$row['SMT'];?></td>
									<td><?=$row['Known_aliases'];?></td>
									<td><?=$row['Hair_color'];?></td>
									<td><?=$row['Blood_type'];?></td>
									<td><?=$row['Clothing_description'];?></td>
									<td><?=$row['Social_media_accounts'];?></td>
									<td><?=$row['Birth_defect'];?></td>
									<td><img height="100" width="100" src="images/<?php echo $row['Image'];?>"></td>
									<td><?=$row['Date_of_disappearance'];?></td>
									<td><?=$row['Date_of_reporting'];?></td>
									<td><a style="color: orange; text-decoration: none;" href="update.php?Case_number=<?=$row['Case_number']?>">UPDATE</a></td>
									<td><a style="color: orange; text-decoration: none" href="delete.php?Case_number=<?=$row['Case_number']?>">DELETE</a></td> 
								</tr>

							<?php
								}
							?>
							</table>
							
						</div>
					<?php
					}
					?>
			</center>

	</div>
	<hr>
	<div id="footer">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
	</div>
</body>
</html>