<?php
    include('DB.php');
//     $ids = array();
//     // $ids = implode(",",$_POST["id"]);
//     $ids = $_POST["id"];
    
    
//     // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
//     $deactive = "UPDATE inf SET active=0 where n_id= ".$ids." ";
    
//     $result = mysqli_query($con,$deactive);
//     echo mysqli_error($con);
// ////////////////////////////////////////////////////////////

    if(ISSET($_REQUEST['n_id'])){
		$notificationID = $_REQUEST['n_id'];

		 $deactive = "UPDATE inf SET active=0 where n_id= ".$notificationID." ";
    
    $result = mysqli_query($con,$deactive);
    echo mysqli_error($con);
	if(@$result === TRUE)
		  { ?>
		<script type='text/javascript'>
		alert("marked...!");
		window.location.replace("../index.php");
		</script>
	<?php }}

	?>
