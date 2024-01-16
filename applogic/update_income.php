<?php
include "../maintanance/dbconnection.php";

if (isset($_POST['submit']) && !empty($_POST['description']) && !empty($_POST['amount']) && !empty($_POST['date'])) 
 {

 	$incomeID = $_POST['incomeID'];
 	//$catID = $_POST['cat_name'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];


	$update = mysqli_query($con , "UPDATE income_tb SET I_description = '$description' , I_amount = '$amount' , I_date = '$date'  WHERE incomeID = '$incomeID'");

 	# code...

 	if($update === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../income.php");
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

 