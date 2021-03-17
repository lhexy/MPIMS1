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
	if (isset($_POST['home'])) {
		session_destroy();
		header('Location:home.php');
	}
	if (isset($_POST['report'])) {
		session_destroy();
		header('Location:report.php');
	}
	if (isset($_POST['about'])) {
		session_destroy();
		header('Location:about.php');
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
				window.open('about.php');
			}
		}
		function permit_search(){
			var permit = prompt("You need an administrator permission! Enter administrator password.")
			if(permit == 'password'){
				header('Location:search.php');
			} 
			else{
				alert('Access denied!')
				window.open('about.php');
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
	<div id="content"><br>
			
		<div id="dev"> <br>
			<div id="about_head1">
				<center><h2>What is Missing Person Information Management System?</h2></center>
				<p>
					<h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Missing Person Information Management System was made to serve the public to locate missing persons. Its aim is to reduce the incidents of disappearance of the local people.We support local agencies, who have the same mission as ours.We have to reunite the people who been away from their families. All details about missing persons are kept confidential an are not made available to the public unless permission has been granted by the family of the missing person and investigating officers.</h3>
				</p>
				<div id="dv_about_logo">
					<img id="img_about" src="images/FINAL.png">
				</div>
			</div>
			<div id="about_head2">
				<center><h2>Developers</h2></center>
				<div id="dvlprs1">
					<img id="img_dvlprs" src="images/jessy.jpg">
					<center>Jessryll Almacin Cadorna</center>
				</div>
				<div id="dvlprs2">
					<p>
						Nickname: Jess&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;coder,<br>
						Age: 16<br>
						Birthday: Dec. 25, 2004<br>
						Status: Single<br>
						Address: Barugo, Leyte<br>
						Profession: Student<br>
						Motto/quote: "Hindi lahat ng bagay sa taas mo makikita, may mga bagay talaga na minsan payuko mong makukuha."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-credits to Zaito
					</p>
				</div>
				<div id="dvlprs1">
					<img id="img_dvlprs" src="images/meAnn.jpg">
					<center>Maryann Advincula Martinez</center>
				</div>
				<div id="dvlprs2">
					<p>
						Nickname: Ann &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;coder<br>
						Age: 20<br>
						Birthday: May 19, 2000<br>
						Status: Single<br>
						Address: Barugo, Leyte<br>
						Profession: Student<br>
						Motto/quote: "Kapag nadapa ka, Bumangon ka ! Tandaan mo may pagkakataon ka pa para ipakita sa kanila na hindi sa lahat ng pagkakataon TAMA sila !."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ctto
					</p>
				</div>
				<div id="dvlprs1">
					<img id="img_dvlprs" src="images/mafe.jpg">
					<center>Marie Fe Baluran Aguilos</center>
				</div>
				<div id="dvlprs2">
					<p>
						Nickname: Mafe&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;coder, idealist<br>
						Age: 20<br>
						Birthday: March 8,2000<br>
						Status: Single<br>
						Address: Carigara, Leyte<br>
						Profession: Student<br>
						Motto/quote: " I am not young enough to know everything"<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-unknown
					</p>
				</div>
				<div id="dvlprs1">
					<img id="img_dvlprs" src="images/leah.jpg">
					<center>Leah Mae Landrito Panis</center>
				</div>
				<div id="dvlprs2">
					<p>
						Nickname: mae&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;coder, designer<br>
						Age: 20<br>
						Birthday: February 07, 2000<br>
						Status: Single<br>
						Address: Barugo, Leyte<br>
						Profession: Student<br>
						Motto/quote: "Hindi lahat ng umiiri nanganganak yung iba, Tumatae lang."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ctto
					</p>
				</div>
				<div id="dvlprs1">
					<img id="img_dvlprs" src="images/don.jpg">
					<center>Donna Arcagua Salinasan</center>
				</div>
				<div id="dvlprs2">
					<p>
						Nickname: Don&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;coder, financer<br>
						Age: 21<br>
						Birthday: March 28,1999<br>
						Status: Single<br>
						Address: Barugo, Leyte<br>
						Profession: Student<br>
						Motto/quote: "Ang estudyanteng hindi nakapag-aral multiple choice ang inaabangan."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ctto :)
					</p>
				</div>
			</div>
			<hr>
			<div id="footer">
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Contact Number: 09876543210</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">G-mail: MPIMS21@gmail.com</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Facebook page: fbMPIMS2021</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="contact">Instagram: instMPIMS2021</i></p>
			</div>
		</div>
	</div>
</body>
</html>