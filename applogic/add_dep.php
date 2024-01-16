<?php

include "../maintanance/dbconnection.php";

if (isset($_POST['add'])) 

{
	$depname =  $_POST['dep_name'];
	$desc	 =	$_POST['description'];		
	# code...

	// queryyyyyy

	$query = "INSERT INTO depertments (dep_name , description) VALUES ('$depname' , '$desc')";
	$sql   =  mysqli_query($con, $query);

	if ($sql === TRUE ) 
	{
		?>
		<script type="text/javascript">
			alert("depertment added successfully!");
			window.location.replace("../departments.php");
		</script>

		# code...
		<?php
	}
}

?>