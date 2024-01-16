
<?php
include "../maintanance/dbconnection.php";

if (isset($_POST['edit_u']) && !empty($_POST['rank'])) 
 {

	$userID = $_POST['userID'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$othernames = $_POST['othernames'];
	$gender = $_POST['gender'];
	$Contact = $_POST['Contact'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$rank = $_POST['rank'];
	$dep = $_POST['dep'];



	$update = mysqli_query ($con,"UPDATE user SET firstname = '$surname', lastname ='$lastname' , othernames = '$othernames', gender = '$gender' , contactNo = '$Contact' , address = '$address' , email = '$email', rank =   '$rank' , depID = '$dep' WHERE userID = '$userID'");

 	# code...

 	if($update === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("user information updated Successfully!");
          window.location.replace("../users.php");
         </script>';
    
    }

	else
	{
		echo '
         <script type="text/javascript">
          alert("An Error occured...!");
         </script>';
	}
 }

?>


