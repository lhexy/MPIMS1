<?php
require('db_connect.php');
if (isset($_GET['Case_number'])) {
			$Case_number=$_GET['Case_number'];

			$sql="DELETE FROM tbl_records WHERE Case_number=$Case_number";
			if(mysqli_query($connectivity,$sql)){
				$sql="INSERT INTO tbl_found WHERE Case_number=$Case_number";
				header('location:view_records.php');
			}
			else{
				mysqli_error($connectivity);
			}
			
		}

?>