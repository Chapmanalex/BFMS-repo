<?php 
 include "../maintanance/dbconnection.php";
 if (isset($_POST['submit'])) 
 {


 	$amount = $_POST['amount'];
	$description = $_POST['description'];
	//$arr['address'] = $_POST['address'];

	$data = mysqli_query($con , " INSERT INTO income_tb (I_amount , I_description) values ( '$amount' ,'$description')");

	if(@$data === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../income.php");
         </script>';
    die();
    }

	else{

		echo '
         <script type="text/javascript">
          alert("something went wrong");
         </script>';
		
	}

 	# code...
 }

 

?>