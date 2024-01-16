<?php



include ("session.php");
include "maintanance/access.php";
access ('ADMIN');
include "maintanance/dbconnection.php";

//A function to get difference between to numbers
function diff($a=0, $b=0)
{
  $c = ($a - $b);
  return $c;
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>Budgets</title>
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

    <div class=" syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <img class="img img-fluid rounded-circle" 
        src="<?php   echo $userprofile ?>" 
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
        <a href="income.php" class="list-group-item list-group-item-action ">
        	<span data-feather="pocket"></span>  My-Income </a>

<!-- side-bar budgets -->
        <a href="budget.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My-Categories </a>

<!-- side-bar expenses -->
		<a href="expenses.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> My-Expenses </a>

<?php if (access ('ADMIN' , false )): ?>
        <a href="budgetplans.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> Budgets </a>
<?php endif; ?>

<!-- side-bar departments -->
		<a href="departments.php" class="list-group-item list-group-item-action "><span data-feather="briefcase"></span> My-Depertments </a>

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
        <a href="system/" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> System Settings</a>

        <!-- side-bar logout -->
        <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="log-out"></span> Logout</a>
      </div>
      <hr>
      <div class="sidebar-heading">communication </div>
      <div class="list-group list-group-flush">
        <a href="noti/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> text </a>
      </div>
      <hr>
      <div class="list-group">
      <!-- <span data-feather ="chat"></span> -->
      <form id="frm_data">
        <div class="input-group " style=" border: 1; border-radius: 5px;">
        <input class="form-control list-group-item" type="text" name="notifications_name" required id="notifications_name" placeholder="message-title">
          <input type="textarea" name="message" id="message" rows="2" class="form-control list-group-item" placeholder="message" >
          <input type="submit" id="notify" name="submit" class="btn btn-info" value="send"/>
        <!-- <button type="submit" value ="submit" id="submit"> <span data-feather ="send"></span> -->
      </div>
      </form>
      
    </div>
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
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                <?php echo $rank ?>
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
  <div class="row">
    <div class="col-md">
      <div class="card mt-4">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
            <h3 class="">Manage Budgets</h3>
          </div>
          <div class="col">
            <a  href="budget_reps.php" 
                class="btn btn-flat btn-info ">
                <span data-feather ='eye'>
                    </span> View Budget report </a>
          </div>
          <div class="col">
            <button 
              class="btn btn-info " 
              data-toggle="modal" 
              data-target="#myModal">
              <span data-feather ='plus'></span>  New budget
          </button>
          </div>
          </div>
        </div>

        <div class="card-body">
<!-- start of card body            -->
 <!-- start of table codes -->
<div class="panel panel-default">
<!-- <div class="panel-heading">
      Modals Example
          </div> -->
      <div class="panel-body">

        <!-- add new budget modal model-->

          <div class="modal fade" 
                id="myModal" 
                tabindex="-1" 
                role="dialog" 
                aria-labelledby="myModalLabel" 
                aria-hidden="true">
                                
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                           <h4 class="modal-title" 
                           id="myModalLabel">Add a new Budget</h4>
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
                          <form   action="applogic/manage_budgets.php" 
                                  method="POST"
                                  id="budget_form" 
                                  enctype="multipart/form-data">

                          <!-- <div style=" margin-left:100px;"> -->
            
                                  <div class="row" >
                                  <div class="form-group col-md-12" >
                                      <label>BudgetID: </label>
                                            <input type="text" 
                                            name="BudgetID" 
                                            id="BudgetID" 
                                            class="form-control" 
                                            placeholder="auto-generated"  
                                            readonly>
                                  </div>
                    
                                  <br>
                      
                      
                    
                                  <div class="form-group col-md-12">
                                      <label> Budget name : </label>
                                            <input type="text" 
                                            name="budgetname" 
                                            id="budgetname"  
                                            class="form-control"
                                            placeholder="Please Enter Budget Name :"   
                                            onBlur="<!--this.value=trim(this.value);-->"
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label> Budget Description : </label>
                                            <input type="textarea" 
                                            name="des" 
                                            id="des"  
                                            class="form-control"
                                            placeholder="describe the Budget"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label> Amount: </label>
                                            <input type="textarea" 
                                            name="b_amount"
                                            id="b_amount"  
                                            class="form-control"
                                            placeholder="amount allocated to this categry"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label> Start date : </label>
                                            <input type="date" 
                                            name="s_date" 
                                            id="s_date"  
                                            class="form-control"
                                            placeholder="date when budget starts"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label> End date : </label>
                                            <input type="date" 
                                            name="e_date" 
                                            id="e_date"  
                                            class="form-control"
                                            placeholder="date when budget expires"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>

                                  <br>

                                <div class="form-group col-md-12" >
                              <label for="E_cat">select depertment:</label>
                              <select class="form-control" 
                                      name="dep" id="dep">
                              <option value="" 
                                      selected="">Choose Depertment
                              </option>
                    <?php
                      $getAll = mysqli_query($con, "SELECT  * from depertments ");
                       while($row = mysqli_fetch_array($getAll))
                      {?>
                              <option value="<?php echo $row['depID']; ?>">
                                          <?php echo  $row['dep_name'];?>  
                              </option>

                     <?php
                       } ?>   
                              </select>
                             </div>
                                  <!-- <div class="form-group col-md-12">
                                      <label> Days left : </label>
                                            <input type="text" 
                                            name="days" 
                                            id="days"  
                                            class="form-control"
                                            value= calc_days();
                                            placeholder="date when category budget expires"   
                                            onBlur="this.value=trim(this.value);-->" 
                                           <!-- required>
                                  </div> -->


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
                                          name="add_b"  
                                          value="Save" 
                                          class="btn btn-primary" 
                                          style=""/>

                                  <!-- cancel btn -->
                                  <input  type="reset" 
                                          id="reset" 
                                          value="Cancel" 
                                          class="btn btn-secondary btn-reset"
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

<!-- start a category datatable -->
                          <!-- Advanced Tables -->
<div class="panel panel-default">
     <div class="panel-heading">
     
     </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="dataTables">
                   <thead>
                         
                   <th>Budget Name </th>
                   <th>Description</th>
                   <th>Amount</th>
                   <th>Balance</th>
                   <th>Days left</th>
                   <th>Depertment</th>
                   <th>Actions</th>
                   </tr>

                   </thead>

                    <tbody>
  
                        
        <?php

          $daysleft = mysqli_query($con, "SELECT b.*, DATEDIFF(enddate, NOW()) AS remaining_days, d.depID ,d.dep_name FROM budgets b , depertments d WHERE d.depID = b.depID "); 
          // $sql = mysqli_query($con, "SELECT * FROM categories");
              while( $row = mysqli_fetch_array($daysleft))
                    // $row = mysqli_fetch_array($sql)
                          {
                            ?>
              <tr>
              <td><?php echo $row['budgetname']?></td>
              <td><?php echo $row['description']?></td>
              <td><?php echo number_format((float)$row['budget_amount'], 2, '.', '')?></td>
              <td><?php echo $row['curentbalance']; ?></td>
              <?php  $days = $row['remaining_days'];
                      if ($days <= 0) {?>
                       <td><?php echo '<div class="badge badge-danger" title=" your '.$row['budgetname'].' budget expired  ">expired </div>'; ?></td>
                <?php }
                    elseif ($days > 0 && $days < 10 ) { ?>
                   <td><?php echo '<div class="badge badge-warning" title="your'.$row['budgetname'].' budget is about to expire ">
                    '.$row['remaining_days'].' remaining </div>'; ?></td>

                <?php }else {?>
                <td><?php echo '<div class="badge badge-success" title="your'.$row['budgetname'].' budget is still running ">
                    '.$row['remaining_days'].' days left </div>' ?></td>
                    <?php }?>

              
              <td> <?php echo $row['dep_name']?></td> 
              <td class="input-group">
              <div><button type="button" class="btn btn-info btn-xs" data-target="#modal_update<?php echo $row['budgetID']?>"data-toggle='modal'><span data-feather= 'edit'></span></button>
              </div>
              &nbsp;
                  <div>
                    <button type="button" class="btn btn-danger btn-xs" data-target="#modal_delete<?php echo $row['budgetID'];?>" data-toggle='modal'><span data-feather='delete'></span>
                    </button>
                  </div>
             </td>

               <!-- the delete modal............................ -->

            <div class="modal fade" id="modal_delete<?php echo $row['budgetID']?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">System information ....!</h4>
                  </div>
                  <div class="modal-body">
                    <center><h5>you are about to delete a budget record For <br>(<?php echo $row['budgetname'];  ?>) </h5></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                    <a type="button" class="btn btn-danger" href="applogic/delete_budget.php?budgetID=<?php echo $row['budgetID']; ?>">continue</a>
                  </div>
                </div>
              </div>
            </div>  


                    <!-- the edit modal -->

                    <div  class="modal fade" 
                          id="modal_update<?php echo $row['budgetID']?>" 
                          aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <div class="modal-header">
                      <h3 class="modal-title">edit Budget</h3>
                      <button type="button" 
                              class="close" 
                              data-dismiss="modal" 
                              aria-hidden="true">&times;
                      </button>
                    </div>
                
                        <form action="applogic/manage_budgets.php " 
                              method="POST" 
                              enctype="multipart/form-data">

                    <div class="modal-body">
                 
                  <!-- <center><h4>Are you sure you want to delete this expense?</h4></center> -->
                  <!-- hidden fields -->

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Budget ID </label>
                                <input type="text" 
                                name="b_ID" 
                                id="b_ID" 
                                class="form-control" 
                                value="<?php echo $row['budgetID']?>" 
                                readonly>
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Budget name </label>
                                <input type="text" 
                                name="budgetname" 
                                id="budgetname" 
                                class="form-control" 
                                value="<?php echo $row['budgetname']?>" 
                                required="">
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Description</label>
                          <input  type="text" 
                                  name="desc" 
                                  id="desc" 
                                  class="form-control" 
                                  value="<?php echo $row['description']?>" 
                                  required="">
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>budget amount </label>
                          <input  type="text" 
                                  name="b_amount" 
                                  id="b_amount" 
                                  class="form-control" 
                                  value="<?php echo $row['budget_amount']?>" 
                                  required="">
                          </div>
                    </div>
                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>start date</label>
                          <input  type="text" 
                                  name="s_date" 
                                  id="s_date" 
                                  class="form-control" 
                                  value="<?php echo $row['startdate']?>" 
                                  required="">
                          </div>
                    </div>
                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>End date </label>
                          <input  type="text" 
                                  name="e_date" 
                                  id="e_date" 
                                  class="form-control" 
                                  value="<?php echo $row['enddate']?>" 
                                  required="">
                          </div>
                    </div>
                    <div class="row">
                          <div class="form-group col-md-12">
                          <label for="budget">select depertment:</label>
                              <select class="form-control" 
                                      name="dep" id="dep" required >
                              <option value="" 
                                      selected="">Choose Depertment
                              </option>
                    <?php
                      $getAll = mysqli_query($con, "SELECT  * from depertments ");
                       while($row = mysqli_fetch_array($getAll))
                      {?>
                              <option value="<?php echo $row['depID']; ?>">
                                          <?php echo  $row['dep_name'];?>  
                              </option>

                     <?php
                       } ?>   
                              </select>
                          </div>
                    </div>
                </div>

                <!-- <div class="row" >
               <div class="form-group">  -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <input type="submit" id="submit" name="update_budget"  value="Yes" class="btn btn-primary" />
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







          <!-- /end of card body -->
        </div>
      </div>
    </div>
  </div>
  

  
  
  <!-- container fluid -->
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
