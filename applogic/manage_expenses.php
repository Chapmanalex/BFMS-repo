<?php 
$hostname = "localhost";
$username1 = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username1,$password,$dbname) OR die('failed to connect to the database');
function diff($a=0, $b=0)
{
  $c = ($a - $b);
  return $c;
}

 if (isset($_POST['submit'])) 
 {

  $budgetID = $_POST['activebudget'];
 	$catID = $_POST['E_cat'];
	$item = $_POST['items'];
	$description = $_POST['description'];
	$amount = stripcslashes($_POST['amount_spent']);
	$user = $_POST['user'];
  $depat = $_POST['dep'];
	//$arr['address'] = $_POST['address'];

   // check budget expiry data
  $checkexpiry = mysqli_query($con ,"SELECT * , DATEDIFF(enddate , NOW()) as days FROM budgets WHERE budgetID = '$budgetID'" );
    $days = mysqli_fetch_array($checkexpiry);
    if ($days['days'] <= 0) 
    {
    
    echo '
         <script type="text/javascript">
          alert(" Sorry the budget you selected Already expired .....!");
          window.location.replace("./expenses.php");
         </script>';
         die();

      # code...
    }

    $checkbal = mysqli_query($con, "SELECT sum(E_amount) as amount FROM expenses WHERE budgetID = '$budgetID'");
    $balance = mysqli_fetch_array($checkbal);

    $catbal = diff($days['budget_amount'] , $balance['amount']);
    if ($amount > $catbal)
    {
       echo '
         <script type="text/javascript">
          alert("sorry the expense amount is greater than the current budget amount ....!");
          window.location.replace("./expenses.php");
         </script>';
         die();
      # code...
    }
    if ($catbal <= 0)
     {

      echo '
         <script type="text/javascript">
          alert("select a running budget ....!");
          window.location.replace("./expenses.php");
         </script>';
         die();
      # code...
    }


	$data = mysqli_query($con , " INSERT INTO expenses (catID , item , E_description , E_amount , UserID, depID, budgetID) values ( '$catID' , '$item' , '$description' ,'$amount' , '$user', '$depat','$budgetID')");
   

   $data1 = mysqli_query($con, "UPDATE budgets SET curentbalance = curentbalance - $amount WHERE budgetID = $budgetID");
    $output ='';
	if(@$data === TRUE && @$data1 === TRUE)
    {
      echo '
         <script type="text/javascript">
          alert("Success!");
          window.location.replace("./expenses.php");
         </script>';
    
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



<!-- deleting expenses -->

<?php
  if(ISSET($_REQUEST['expenseID'])){
    $expenseID = $_REQUEST['expenseID'];
    
    
    // $delete = mysqli_query($con, "DELETE FROM `expense_tbl` WHERE `expense_id`='$expense_id'") or die("Failed to delete a row!");
    $sql = "DELETE FROM `expenses` WHERE `expenseID`='$expenseID'";
    $result = mysqli_query($con, $sql);
    // }  
    //if data deleted successfully
  if(@$result === TRUE)
    { ?>
    <script type='text/javascript'>
    alert("Item deleted successfully!");
    window.location.replace("../expenses.php");
    </script>
<?php 
  }
  elseif (@$result !== TRUE)
  {
    ?>
    <script type='text/javascript'>
    alert("trying to delete a category !");
    window.location.replace("../expenses.php");
    </script>

    <?php
  }
}
 mysqli_close($con);
?>

<!-- the notifications code -->

<?php 
if (isset($_POST['view'])) 
{

  # code...
}
?>