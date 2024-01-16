<?php 
	include "../maintanance/dbconnection.php";
	if(ISSET($_REQUEST['userID']))
	{
		$userID = $_REQUEST['userID'];
		
		
		// $delete = mysqli_query($con, "DELETE FROM `expense_tbl` WHERE `expense_id`='$expense_id'") or die("Failed to delete a row!");
		$sql = "DELETE FROM `user` WHERE `userID`='$userID'";
		$result = mysqli_query($con, $sql);
	}	
    //if data deleted successfully
	if(@$result === TRUE)
		  { ?>
		<script type='text/javascript'>
		alert("user deleted successfully!");
		window.location.replace("../users.php");
		</script>
<?php 
	}?>

?>