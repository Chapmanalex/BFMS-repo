
<?php 
include ("session.php");
include "maintanance/access.php";
// access ('ADMIN');
// include "maintanance/dbconnection.php";
include "applogic/manage_expenses.php";
include "applogic/Update_expenses.php";
//access ('ADMIN');

// function for diference



 ?>
<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>Expenses</title>
  <link rel="icon" href="img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">
				
				<!-- Bootstrap core CSS -->
			  <link href="css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="css/css/style.css" rel="stylesheet">

			  <!-- Feather JS for Icons -->
			  <script src="js/feather.min.js"></script>
</head>


<body>
<div class="d-flex" id="wrapper">

	<!-- Sidebar -->

    <div class="syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <img class="img img-fluid rounded-circle" 
        src=" <?php   echo $userprofile ?> " 
        width="120">
        <br>
       <h5><?php echo $username ?></h5>
        <p><?php echo $useremail ?></p>
      </div>

      <div class="sidebar-heading">Management</div>

      <div class="list-group list-group-flush">
<!-- side-bar dashsboard -->
        <a href="index.php" class="list-group-item list-group-item-action ">
        <span data-feather="home"></span> Dashboard</a>

<!-- sidebar-income -->
<?php if (access ('ADMIN' , false )): ?>
        <a href="income.php" class="list-group-item list-group-item-action ">
        	<span data-feather="pocket"></span>  My-Income </a>
 <?php endif; ?>

<!-- side-bar budgets -->
<?php if (access ('ADMIN' , false )): ?>
        <a href="budget.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My- Categories </a>
 <?php endif; ?>

<!-- side-bar expenses -->
		<a href="expenses.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> My-Expenses </a>

<?php if (access ('ADMIN' , false )): ?>
        <a href="budgetplans.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> Budgets </a>
<?php endif; ?>

   <?php if (access ('USER' , false )): ?>
        <a href="budget_reps.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My_Budget </a>
<?php endif; ?>

<!-- side-bar departments -->
<?php if (access ('ADMIN' , false )): ?>
		<a href="departments.php" class="list-group-item list-group-item-action "><span data-feather="briefcase"></span> My-Depertments </a>
    <?php endif; ?>
    <!-- side-bar department for user -->
<?php if (access ('USER' , false )): ?>
    <a href="dep_reports.php" class="list-group-item list-group-item-action "><span data-feather="briefcase"></span> My-Depertment </a>
<?php endif; ?>

<!-- side-bar users -->
<?php if (access ('ADMIN' , false )): ?>
    <a href="users.php" class="list-group-item list-group-item-action "><span data-feather="users"></span> Users </a>
<?php endif; ?>

      </div>


      <div class="sidebar-heading">Settings </div>

      <div class="list-group list-group-flush">

      	<!-- side-bar profile -->
<!--         <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="edit"></span> Profile</a> -->

        <!-- side-bar system settings -->
        <a href="system/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> System Settings</a>

        <!-- side-bar logout -->
        <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="log-out"></span> Logout</a>
      </div>
      <hr>
      <div class="sidebar-heading">communication </div>
      <div class="list-group list-group-flush">
        <a href="noti/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> text </a>
      </div>
      <hr>
    </div>

    <!-- /#sidebar-wrapper -->


<div class="page-content-wrapper">
	



	 <nav class="navbar navbar-expand-lg navbar-light  border-bottom" >


        <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
          <span data-feather="menu"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25"><?php echo $rank ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Your Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>




<div class="container-fluid">
<!-- / start of the container fluid  -->

    <div class="row mt-4">
      <div class="col md">
        <div class="card card-outline rounded-5">
          <div class="card-header">
            

            <div class="row"> 
            <div class="col-5"> <h3>Manage Expenses</h3></div>
            <div class="col-5 input-group">
               <?php if (access ('ADMIN' , false )): ?>
              <?php 

                  $query = mysqli_query($con ," SELECT SUM(E_amount) AS E_amount FROM expenses");
                  $expenses = mysqli_fetch_array($query);
                ?>
              <?php endif; ?>
              <!-- user QUERY -->
              <?php if (access ('USER' , false )): ?>
              <?php 

                  $query = mysqli_query($con ," SELECT SUM(E_amount) AS E_amount FROM expenses WHERE UserID = '$userid'");
                  $expenses = mysqli_fetch_array($query);
                ?>
              <?php endif; ?>
              <p><strong>Total Expenses &nbsp; : &nbsp; <?php echo $expenses['E_amount']  ?> /=</strong> </p>
            </div>
            <div class="col">
              <button class="btn btn-info pull-right" 
                      data-toggle="modal" 
                      data-target="#myModal">
                      <span data-feather ='plus'></span> 
                      new expense
              </button>
            </div>
            </div>


          </div>
          <div class="card-body">
            <!-- start of the card  body  -->

              <div class="panel panel-default">
<!-- <div class="panel-heading">
      Modals Example
          </div> -->
      <div class="panel-body">
        
        <!-- add expenses model-->

          <div class="modal fade" 
                id="myModal" 
                tabindex="-1" 
                role="dialog" 
                aria-labelledby="myModalLabel" 
                aria-hidden="true">
                                
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                           <h4 class="modal-title" id="myModalLabel">Add a new expense</h4>
        <!-- close modal button -->
                              <button type="button" 
                                      class="close" 
                                      data-dismiss="modal" 
                                      aria-hidden="true">&times;
                              </button>
        <!-- modal heading      -->
                              
                            </div>
        <!-- modal body -->
                            <div class="modal-body">
                            <div class="content">
                            <!-- <div> -->
                          <form   action="" 
                                  method="POST"
                                  id="expensform" 
                                  enctype="multipart/form-data">

                          <!-- <div style=" margin-left:100px;"> -->
            
                                  <div class="row" >
                                    <?php if (access('ADMIN' , false)): ?>
                                  <div class="form-group col-md-12" >
                                      <label for="E_cat">Active budget:</label>
                              
                                      <select class="form-control" 
                                              name="activebudget" id="E_cat"  
                                              required="">
                                    <option value="" 
                                            selected="">Choose Budget
                                    </option>
      <?php
         $getAll = mysqli_query($con, "SELECT b.budgetID, b.budget_amount AS amount, b.budgetname, SUM(i.E_amount) AS amount_spent, b.startdate , b.enddate , DATEDIFF(b.enddate, NOW()) AS remaining_days FROM expenses i, budgets b group by b.budgetID"); 

          // $getAll = mysqli_query($con, "SELECT  * , DATEDIFF(enddate ,NOW()) AS remaining_days from categories");
          while($row = mysqli_fetch_array($getAll)):?>

           <?php 
              $det =  $row['remaining_days'];
              $bal = diff($row['budget_amount'] , $row['amount_spent']);

              if ($det > 0)

              { ?>
                <option value="<?php echo $row['budgetID']; ?>">
                          <?php echo  $row['budgetname'];?>  
                </option>
               <?php  } elseif ($det <= 0) 
               {
                ?>
                <option value="<?php echo $row['budgetID']; ?>">
                          <?php echo  $row['budgetname'] . "<p><strong>(expired)</strong></p>";?>  
                </option>
                  
               <?php }?>

                 <?php   endwhile; ?>  
              </select>
            </div>
            <?php endif; ?>
                <?php if (access('USER' , false )):?>

                  <!-- user budget //////////////// -->
  
                        <div class="form-group col-md-12">
                          <label for="E_cat">Active budget:</label>
              <?php $userbudget = mysqli_query($con , "SELECT * FROM budgets WHERE depID = '$dep'"); 
              $bb = mysqli_fetch_array($userbudget);
              if (!empty($bb)) {?>
                
                <input type="text" 
                       name="activebudget" 
                       id="activebudget"  
                       class="form-control"
                       value="<?php echo $bb['budgetID']; ?>" 
                                <?php echo $bb['budgetname']; ?>
                       readonly="">  

              <?php  } 
              else {?>
                <input type="text" 
                       name="activebudget" 
                       id="activebudget"  
                       class="form-control"
                       value="" 
                       readonly=""> 
              <?php }?>
              
                                             
                                  </div>
                <?php endif; ?>
              </div>
                    
                                  <br>
                      
                      
                    
                                  <div class="form-group col-md-12">
                                      <label> Enter Item(s) : </label>
                                            <input type="text" 
                                            name="items" 
                                            id="items"  
                                            class="form-control"
                                            placeholder="Please Enter items aquired :"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label>Description : </label>
                                            <input type="textarea" 
                                            name="description" 
                                            id="description"  
                                            class="form-control"
                                            placeholder="Describe the item(s) aquired .. :"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label>Amount spent : </label>
                                            <input type="text" 
                                            name="amount_spent" 
                                            id="amount_spent"  
                                            class="form-control"
                                            placeholder="amount spent  :"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>
                                  <br>
                                  <div class="form-group col-md-12">
                                    <label for="category">select Category:</label>
                                    <select class="form-control" 
                                      name="E_cat" id="E_cat" required >
                                      <option value="" 
                                      selected="">Choose expense Category
                                      </option>
                                  <?php
                                    $getA = mysqli_query($con, "SELECT  * from categories ");
                                     while($row = mysqli_fetch_array($getA))
                                    {?>
                                    <option value="<?php echo $row['catID']; ?>">
                                                <?php echo  $row['CategoryName'];?>  
                                    </option>

                                     <?php
                                       } ?>   
                                    </select>
                                    
                                  </div>

                                  <div class="form-group col-md-12">
                                      <label>Expense made by : </label>
                                      <?php 
                                      $sesid = $_SESSION['myses'];
           $user = mysqli_query($con, "SELECT * , CONCAT(firstname,' ', lastname ,' ', othernames) as users_name  FROM user where userID = $sesid");
            while($row = mysqli_fetch_array($user))
                        {?>


                                            <input type="text" 
                                            name="user" 
                                            id="user"  
                                            class="form-control"
                                            value="<?php echo $row['userID'];  }?>" 
                                            placeholder="user...:"   
                                            readonly="">

                                  </div>
                                  <div class="form-group col-md-12">
                                    <label>Your Depertment:</label>
                                    <input type="text" 
                                            name="dep" 
                                            id="dep"  
                                            class="form-control"
                                            value="<?php echo $dep ;?>" 
                                            placeholder="depertment:"   
                                            readonly="">
                                    
                                  </div>


                                  <!-- end of form row -->
                                  </div>
    <?php  if(isset($message)){echo "<font color='FF0000'><h5>$message</font></h5>";} ?>
                                      <!-- </div> -->
                                      <!--  </div> -->

                                      <!-- modal footer -->
                                  <div class="modal-footer">
                    <!-- submit btn          -->
                    <input  type="submit" 
                            id="submit" 
                            name="submit"  
                            value="Add Expense" 
                            class="btn btn-primary" 
                            style=""/>

                    <!-- cancel btn -->
                    <input  type="reset" 
                            id="reset" 
                            value="Cancel" 
                            class="btn btn-secondary " 
                            data-dismiss ="modal"
                            style=""/>

                                  </div>
                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







<!-- / end of modal -->

<!-- start a income datatable -->
                          <!-- Advanced Tables -->
<div class="panel panel-default">
     <div class="panel-heading">
     </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover "  id="dataTables">
                   <thead>
                    <tr>    
                   <th>Expense category</th>
                   <th>Item</th>
                   <th>Description</th>
                   <th>Amount spent</th>
                   <th>made By</th>
                   <th>Date</th>
                   <th>Actions</th>
                   </tr>

                   </thead>

                    <tbody>
  
                        
      

        <?php if (access ('ADMIN' , false )): ?>
            <?php
        $sql = mysqli_query($con, "SELECT c.* , e.* from Categories c INNER JOIN expenses e on c.catID = e.catID ");
        ?>
      <?php endif;?>
      <!-- query for user -->
      <?php if (access ('USER' , false )): ?>
            <?php
        $sql = mysqli_query($con, "SELECT c.* , e.* from Categories c INNER JOIN expenses e on c.catID = e.catID WHERE e.depID = '$dep' ");
        ?>
      <?php endif;?>

      <?php
          
          //$sql = mysqli_query($con, "SELECT * FROM expenses order by E_date ASC");
              while($row = mysqli_fetch_array($sql))
                          {
                            ?>
              <tr>

              <td><?php echo $row['CategoryName']?></td>
              <td><?php echo $row['item']?></td>
              <td><?php echo $row['E_description']?></td>
              <td><?php echo number_format((float)$row['E_amount'], 2, '.', '')?></td>
              <?php 
              $spender = $row['UserID'];
                  if ($spender == $userid) 
                  {
                    ?>
                    <td>
                      <p><i>self<i></p>
                    </td>
                    <?php
                  }else 
                    
                  { 

                    $spender1 = mysqli_query($con, "SELECT u.*,CONCAT(u.firstname,' ',u.lastname,' ',u.othernames) AS name, e.* from user u INNER JOIN expenses e ON e.depID = u.depID ");
                  $spenderrst = mysqli_fetch_array($spender1);

                    ?>
                      <td><?php echo $spenderrst['name']; ?></td>
                  <?php
                  }
              ?>
              
              <td><?php echo $date=DATE_FORMAT(new DateTime($row['E_date']),'d-M-Y') ?></td>


              <td class="input-group">
                <div>
              <button type="button" class="btn btn-info btn-xs" data-target="#modal_update<?php echo $row['expenseID']?>"data-toggle='modal'><span data-feather = 'edit'></span></button>
                </div>
                &nbsp;
                  <div>
                    <?php if (access ('ADMIN' , false )): ?>
                    <button type="button" 
                            class="btn btn-danger btn-xs" 
                            data-target="#modal_delete<?php echo $row['expenseID']?>" 
                            data-toggle='modal'>
                            <span data-feather='delete'></span>
                    </button>
                  <?php endif; ?>
                  </div>
             </td>

                            <!-- the delete modal............................ -->

            <div class="modal fade" id="modal_delete<?php echo $row['expenseID']?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">System information ....!</h4>
                  </div>
                  <div class="modal-body">
                    <center><h5>you are about to delete expense  <br>(<?php echo $row['expenseID'];  ?>) </h5>
                      <p class="text-green">make sure that the cash is reinstated</p></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                    <a type="button" class="btn btn-danger" href="applogic/manage_expenses.php?expenseID=<?php echo $row['expenseID']?>">continue</a>
                  </div>
                </div>
              </div>
            </div>

                    <!-- the edit modal -->

              <div  class="modal fade" 
                          id="modal_update<?php echo $row['expenseID']?>" 
                          aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <div class="modal-header">
                      <h3 class="modal-title">Edit expenses</h3>
                      <button type="button" 
                                      class="close" 
                                      data-dismiss="modal" 
                                      aria-hidden="true">&times;
                              </button>
                    </div>
                
                        <form action="applogic/Update_expenses.php" 
                              method="POST" 
                              enctype="multipart/form-data">

                    <div class="modal-body">
                          <div class="row">
                          <div class="form-group col-md-12">
                          <label>Expense ID :</label>
                                <input type="text" 
                                name="expenseID" 
                                id="expenseID" 
                                class="form-control" 
                                value="<?php echo $row['expenseID']?>" 
                                readonly>
                          </div>
                    </div>


                    <div class="row">
                          <div class="form-group col-md-12">
                            <label for="category">select Category:</label>
                                    <select class="form-control" 
                                      name="cat" id="cat" required >
                                      <option value="" 
                                      selected="">Choose expense Category
                                      </option>
                                  <?php
                                    $getA = mysqli_query($con, "SELECT  * from categories ");
                                     while($a = mysqli_fetch_array($getA))
                                    {?>
                                    <option value="<?php echo $row['catID']; ?>">
                                                <?php echo  $a['CategoryName'];?>  
                                    </option>

                                     <?php
                                       } ?>   
                                    </select>
                          <!-- <label>Expense Category :</label>
                                <input type="text" 
                                name="cat_name" 
                                id="cat_name" 
                                class="form-control" 
                                value="<?php echo $row['CategoryName']?>" 
                                required=""> -->
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Item </label>
                          <input  type="text" 
                                  name="E_item" 
                                  id="E_item" 
                                  class="form-control" 
                                  value="<?php echo $row['item']?>" 
                                  required="">
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Description </label>
                          <input  type="text" 
                                  name="E_description" 
                                  id="E_description" 
                                  class="form-control" 
                                  value="<?php echo $row['E_description']?>" 
                                  required="">
                          </div>
                    </div>
                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Amount spent </label>
                          <input  type="text" 
                                  name="E_amount" 
                                  id="E_amount" 
                                  class="form-control" 
                                  value="<?php echo $row['E_amount']?>" 
                                  required="">
                          </div>
                    </div>
                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Date</label>
                          <input  type="text" 
                                  name="E_date" 
                                  id="E_date" 
                                  class="form-control" 
                                  value="<?php echo $row['E_date']?>" 
                                  required="">
                          </div>
                    </div>
                </div>

                <!-- <div class="row" >
               <div class="form-group">  -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <input type="submit" id="submit" name="update"  value="Yes" class="btn btn-primary" />
                 </div>
                <!-- </div>
               </div> -->
              </form>
              </div>
            </div>
          </div>  
          <?php 
            }
             ob_flush();
          ?>
                        
      </tbody>
    </table>
                    
            </div>
            
        </div>
    </div>




            <!-- / end of card body -->
          </div>
        </div>
      </div>
    </div>

  
  
  <!-- //container fluid -->
</div>



<!-- other codes -->









  
 
	</div>
	<!-- page content wrapper -->

</div>
<!-- wrapper -->







<!-- Bootstrap core JavaScript -->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <!-- DATA TABLE SCRIPTS -->
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
        <script>
                    $(document).ready(function() {
            $('#dataTables').DataTable({
              "order": [[3 , "asc" ]]
            });
          });

            /*$(document).ready(function () {
                $('#dataTables-example').dataTable();
            });*/
    </script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  
  <script>
    feather.replace()
  </script>

</body>
</html>
