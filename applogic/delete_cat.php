<!-- deleting a category -->
<?php
$hostname = "localhost";
$username1 = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username1,$password,$dbname) OR die('failed to connect to the database');

  if(ISSET($_REQUEST['catID'])){
    $catID = $_REQUEST['catID'];
    
    
    // $delete = mysqli_query($con, "DELETE FROM `expense_tbl` WHERE `expense_id`='$expense_id'") or die("Failed to delete a row!");
    $sql = "DELETE FROM `categories` WHERE `catID`='$catID'";
    $result = mysqli_query($con, $sql);
    // }  
    //if data deleted successfully
  if(@$result === TRUE)
    { ?>
    <script type='text/javascript'>
    alert("Item deleted successfully!");
    window.location.replace("../budget.php");
    </script>
<?php 
  }
  elseif (@$result !== TRUE)
  {
    ?>
    <script type='text/javascript'>
    alert("trying to delete a category !");
    window.location.replace("../budget.php");
    </script>

    <?php
  }
}

if (isset($_REQUEST['depID'])) 
{
  $depID = $_REQUEST['depID'];
  $sql = "DELETE FROM `depertments` WHERE `depID`='$depID'";

  $del =  mysqli_query($con,$sql);

  if ($del === TRUE) 
  {?>
    <script type='text/javascript'>
    alert("deleted successfully...!");
    window.location.replace("../departments.php");
    </script>
    
  <?php
}else

 {
  ?>
    <script type='text/javascript'>
    alert("something went wrong...!");
    window.location.replace("../departments.php");
    </script>
    
  <?php
  # code...
}


  # code...
}
 mysqli_close($con);
?>