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
	if (isset($_POST['view'])) {
		session_destroy();
		header('Location:view_records.php');
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search Results Page</title>
	<link rel="stylesheet" type="text/css" href="css/design.css">
	<script type="text/javascript">;
		function permission(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:view_records.php');
			} 
			else{
				alert("Access denied!")
				window.open("search.php");			}
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
		<form action="" method="">
            <b>Searches...
        </form>
    </div>
    <center>
    <div style="color: white; background-color: transparent; overflow: scroll;" id="search_content">
			<h1>Search Results</h1>
			<?php 
				$search_text= $_GET['search_text'];

				$sql = "SELECT * FROM tbl_records WHERE ( Firstname LIKE '%$search_text%')";

				$result = mysqli_query($connectivity,$sql);

					if(mysqli_num_rows($result) > 0){
						echo  "<h2>".mysqli_num_rows($result)." Record found</h2>";

						while($row = mysqli_fetch_assoc($result)){ ?>
							 <div>
							 <img height="200" width="200" src="images/<?php echo $row['Image']; ?>">
							 <h2>Fullname:  <?php echo $row['Firstname']; ?>
							 				<?php echo $row['Middlename']; ?>
							 				<?php echo $row['Lastname']; ?>
							 </h2>
							 <h2>Age: <?php echo $row['Age']; ?></h2>
							 <h2>SMT: <?php echo $row['SMT']; ?></h2>
							 <h2>Known aliases: <?php echo $row['Known_aliases']; ?></h2>
							 <h2>Hair color: <?php echo $row['Hair_color']; ?></h2>
							 <h2>Bloodtype: <?php echo $row['Blood_type']; ?></h2>
							 <h1>Clothing description: <?php echo $row['Clothing_description']; ?></h1>
							 <h2>Social media accounts: <?php echo $row['Social_media_accounts']; ?></h2>
							 <h2>Birth defect: <?php echo $row['Birth_defect']; ?></h2>
							 <h2 >Image: <?php echo $row['Image']; ?></h2>
							 <h2>Date of disappearance: <?php echo $row['Date_of_disappearance']; ?></h2>
							 <h2>Date of reporting: <?php echo $row['Date_of_reporting']; ?></h2>
							 <hr>




					<?php	}


					}else {

						echo "No record found!!";
					}


			?>
			
</div>
</div>
</center>
<hr>
<div id="footer">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
	</div>	
</body>
</html>