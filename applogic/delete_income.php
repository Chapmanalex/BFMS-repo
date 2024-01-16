
 <?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username,$password,$dbname) OR die('failed to connect to the database');
	if(ISSET($_REQUEST['incomeID'])){
		$incomeID = $_REQUEST['incomeID'];
		
		
		// $delete = mysqli_query($con, "DELETE FROM `expense_tbl` WHERE `expense_id`='$expense_id'") or die("Failed to delete a row!");
		$sql = "DELETE FROM `income_tb` WHERE `incomeID`='$incomeID'";
		$result = mysqli_query($con, $sql);
		// }	
    //if data deleted successfully
	if(@$result === TRUE)
		  { ?>
		<script type='text/javascript'>
		alert("Item deleted successfully!");
		window.location.replace("../income.php");
		</script>
<?php 
	}
}
?>