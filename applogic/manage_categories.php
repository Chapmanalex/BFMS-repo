<?php 
 include "../maintanance/dbconnection.php";

 // inserting into the categories table 

 if (isset($_POST['add'])) 
 {


  $catname = $_POST['catname'];
  $description = $_POST['c_description'];

	$data = mysqli_query($con , " INSERT INTO categories (CategoryName , description) values ( '$catname','$description')");

	if(@$data === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../budget.php");
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
<!-- Updating a category .... -->
<?php
if (isset($_POST['update_cat'])) 
 {
  $catID = $_POST['catID'];
  $catname = $_POST['catname'];
  $description = $_POST['description'];

  $update = mysqli_query($con , "UPDATE categories SET CategoryName = '$catname', description = '$description'  WHERE catID = '$catID'");

  # code...

  if($update === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("../budget.php");
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




