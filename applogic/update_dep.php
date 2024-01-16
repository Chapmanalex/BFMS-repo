<?php 
include "../maintanance/dbconnection.php";
if (isset($_POST['update_dep'])) 
{	

	$depID 	 =  $_POST['depID'];
	$depname =  $_POST['dep_name'];
	$desc	 =	$_POST['description'];	

	$updat = "UPDATE depertments SET dep_name = '$depname' , description = '$desc' WHERE depID = '$depID' ";

	$sql = mysqli_query($con , $updat);

	if ($sql === TRUE) 
	{
		?>
	<script type="text/javascript">
		alert("depertmet updated successfully");
		window.location.replace("../departments.php");
	</script>

	<?php
		# code...
	}else

	{
		?>
		<script type="text/javascript">
			alert("something went wrong");
			window.location.replace("../departments.php");
		</script>

	<?php
		# code...
	}


	
	# code...
}
?>