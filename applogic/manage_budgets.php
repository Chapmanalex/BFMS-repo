<?php 
 include "../maintanance/dbconnection.php";

 // inserting into the categories table 

 if (isset($_POST['add_b'])) 
 {


  $b_name = $_POST['budgetname'];
  $description = $_POST['des'];
  $amount = $_POST['b_amount'];
  $startdate = $_POST['s_date'];
	$enddate = $_POST['e_date'];
  $depi = $_POST['dep'];

	//$arr['address'] = $_POST['address'];

	$data = mysqli_query($con , " INSERT INTO budgets (budgetName , description , budget_amount , curentbalance, startdate , enddate, depID) values ( '$b_name','$description','$amount','$amount','$startdate' ,'$enddate', '$depi')");
	if(@$data === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../budgetplans.php");
         </script>';
    die();
    }

	else{

		echo '
         <script type="text/javascript">
          alert("something went wrong");
         </script>';
         die();
		
	}

 	# code...
 }

 

?>
<!-- Updating a category .... -->
<?php
if (isset($_POST['update_budget'])) 
 {
  $bugdetID = stripcslashes($_POST['b_ID']);
  $name = stripcslashes($_POST['budgetname']);
  $desc = stripcslashes($_POST['desc']);
  $B_amount = stripcslashes($_POST['b_amount']);
  $startdate = $_POST['s_date'];
  $enddate = stripcslashes($_POST['e_date']);
  $depi = stripcslashes($_POST['dep']) ;


  $update = mysqli_query($con , "UPDATE budgets SET budgetname = '$name', description = '$desc' , budget_amount = '$B_amount' ,startdate = '$startdate', enddate ='$enddate', depID = '$depi' WHERE budgetID = '$bugdetID'");

  # code...

  if($update === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../budgetplans.php");
         </script>';
    
    }

  else
  {
    echo '
         <script type="text/javascript">
          alert("An Error occured...!");
          window.location.replace("../budgetplans.php");
         </script>';
  }
 }

 ?>




