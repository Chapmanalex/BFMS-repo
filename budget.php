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
	<title>categories</title>
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
            <h3 class="">Manage Expence Categories</h3>
          </div>
          <div class="col">
            <!-- <a  href="catreports/" 
                class="btn btn-flat btn-info ">
                <span data-feather ='eye'>
                    </span> View category report </a> -->
          </div>
          <div class="col">
            <button 
              class="btn btn-info " 
              data-toggle="modal" 
              data-target="#myModal">
              <span data-feather ='plus'></span>  New Category
          </button>
          </div>
          </div>
        </div>

        <div class="card-body">
<!-- start of card body     -->
 <!-- start of table codes -->
<div class="panel panel-default">
<!-- <div class="panel-heading">
      Modals Example
          </div> -->
      <div class="panel-body">

        <!-- add income model-->

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
                           id="myModalLabel">Add a new Expense category</h4>
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
                          <form   action="applogic/manage_categories.php" 
                                  method="POST"
                                  id="category_form" 
                                  enctype="multipart/form-data">

                          <!-- <div style=" margin-left:100px;"> -->
            
                                  <div class="row" >
                                  <div class="form-group col-md-12" >
                                      <label>CatID : </label>
                                            <input type="text" 
                                            name="catID" 
                                            id="CatID" 
                                            class="form-control" 
                                            placeholder="auto-generated"  
                                            readonly>
                                  </div>
                    
                                  <br>
                      
                      
                    
                                  <div class="form-group col-md-12">
                                      <label> Expense category name : </label>
                                            <input type="text" 
                                            name="catname" 
                                            id="catname"  
                                            class="form-control"
                                            placeholder="Please Enter category Name :"   
                                            onBlur="<!--this.value=trim(this.value);-->"
                                            required>
                                  </div>

                                  <br>

                                  <div class="form-group col-md-12">
                                      <label> Cat Description : </label>
                                            <input type="textarea" 
                                            name="c_description"
                                            id="c_description"  
                                            class="form-control"
                                            placeholder="describe the category"   
                                            onBlur="<!--this.value=trim(this.value);-->" 
                                            required>
                                  </div>
                 
                                  </div>
    <?php  if(isset($message)){echo "<font color='FF0000'><h5>$message</font></h5>";} ?>
                                      <!-- </div> -->
                                      <!--  </div> -->

                                      <!-- modal footer -->
                                  <div class="modal-footer">
                                  <!-- submit btn          -->
                                  <input  type="submit" 
                                          id="submit" 
                                          name="add"  
                                          value="Save" 
                                          class="btn btn-primary" 
                                          style=""/>

                                  <!-- cancel btn -->
                                  <input  type="reset" 
                                          id="reset" 
                                          value="Cancel" 
                                          class="btn btn-secondary" 
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
<tr>
<th>Category Name </th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$daysleft = mysqli_query($con, "SELECT * FROM categories"); 
// $sql = mysqli_query($con, "SELECT * FROM categories");
while( $row = mysqli_fetch_array($daysleft))
  {?>
<tr>
<td><?php echo $row['CategoryName']?></td>
<td><?php echo $row['description']?></td>
<td class="input-group">
<div>
  <button type="button" class="btn btn-info btn-xs" data-target="#modal_update<?php echo $row['CategoryName']?>"data-toggle='modal'><span data-feather= 'edit'></span>
  </button>
</div>
&nbsp;
<div>
  <button type="button" class="btn btn-danger btn-xs" data-target="#modal_delete<?php echo $row['catID']?>" data-toggle='modal'><span data-feather='delete'></span>
  </button>
</div>
</td>
</tr>

               <!-- the delete modal............................ -->

            <div class="modal fade" id="modal_delete<?php echo $row['catID']?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">System information ....!</h4>
                  </div>
                  <div class="modal-body">
                    <center><h5>you are about to delete an expense category record <br>(<?php echo $row['CategoryName'];  ?>) </h5></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                    <a type="button" class="btn btn-danger" href="applogic/delete_cat.php?catID=<?php echo $row['catID']?>">continue</a>
                  </div>
                </div>
              </div>
            </div>  


                    <!-- the edit modal -->

                    <div  class="modal fade" 
                          id="modal_update<?php echo $row['CategoryName']?>" 
                          aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <div class="modal-header">
                      <h3 class="modal-title">edit category</h3>
                      <button type="button" 
                              class="close" 
                              data-dismiss="modal" 
                              aria-hidden="true">&times;
                      </button>
                    </div>
                
                        <form action="applogic/manage_categories.php " 
                              method="POST" 
                              enctype="multipart/form-data">

                    <div class="modal-body">
                 
                  <!-- <center><h4>Are you sure you want to delete this expense?</h4></center> -->
                  <!-- hidden fields -->

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>category ID </label>
                                <input type="text" 
                                name="catID" 
                                id="catID" 
                                class="form-control" 
                                value="<?php echo $row['catID']?>" 
                                readonly>
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>category name </label>
                                <input type="text" 
                                name="catname" 
                                id="catname" 
                                class="form-control" 
                                value="<?php echo $row['CategoryName']?>" 
                                required="">
                          </div>
                    </div>

                    <div class="row">
                          <div class="form-group col-md-12">
                          <label>Description</label>
                          <input  type="text" 
                                  name="description" 
                                  id="description" 
                                  class="form-control" 
                                  value="<?php echo $row['description']?>" 
                                  required="">
                          </div>
                    </div>
                <!-- <div class="row" >
               <div class="form-group">  -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <input type="submit" id="submit" name="update_cat"  value="Yes" class="btn btn-primary" />
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
