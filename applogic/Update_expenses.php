<?php
$hostname = "localhost";
$username1 = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username1,$password,$dbname) OR die('failed to connect to the database');

// updating expenses
if (isset($_POST['update'])) 
 {

 	$expID = $_POST['expenseID'];
 	$catID = $_POST['cat'];
	$item = $_POST['E_item'];
	$description = $_POST['E_description'];
	$amount = $_POST['E_amount'];
	$date = $_POST['E_date'];

	$update = mysqli_query($con , "UPDATE expenses SET catID = '$catID' , item = '$item' , E_description = '$description' , E_amount = '$amount' , E_date = '$date'  WHERE expenseID = '$expID'");

 	# code...

 	if($update === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../expenses.php");
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

