<?php
// include "dbconnection.php";
include("session.php");
include "maintanance/access.php";
access ('ADMIN');
//include 'applogic/update_user.php';
//include "maintanance/dbconnection.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>spenser-users</title>
  <link rel="icon" href="img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">

           <!-- FONTAWESOME STYLES-->
        <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="css/all.css" rel="stylesheet" />
				
				<!-- Bootstrap core CSS -->
			  <link href="css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="css/css/style.css" rel="stylesheet">

        <!-- data tables -->
        <link href="css/dataTables.bootstrap4.css" rel="stylesheet" />

			  <!-- Feather JS for Icons -->
			  <script src="js/feather.min.js"></script>
</head>


<body>
<div class="d-flex" id="wrapper">

	<!-- Sidebar -->

    <div class="syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <a href="profile.php"><img class="img img-fluid rounded-circle" 
        src="<?php   echo $userprofile ?>" 
        width="120"></a>
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
		<a href="users.php" class="list-group-item list-group-item-action "><span data-feather="users"></span> Users </a>

      </div>


      <div class="sidebar-heading">Settings </div>

      <div class="list-group list-group-flush">

      	<!-- side-bar profile -->
<!--         <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="edit"></span> Profile</a>
 -->
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
  <h3 class="mt-4 ">Users</h3>

          <div class="row">
            <div class="col-md">
              <div class="card card-outline card-primary">

                  <div class="card-header">
                    <div class="row">
                    <div class="col-10"><h3 class="card-title">User Lists </h3></div>
                    <div class="col pull-right" id="Adduserbtn">
                    <a href="maintanance/adduser.php" class="btn btn-info "><span data-feather ='plus'>
                    </span> Adduser </a>
                  </div>
                  </div>
                   </div>

                <div class="card-body">
                  



              <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
              <!-- <tr> -->
              <th>UserID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Contact</th>
              <th>Depertment</th>
              <th>Rank</th>
              <th>Action</th>
              </tr>
    </thead>
    <tbody>
  
                        
  <?php 
 
  $sql = mysqli_query($con, "SELECT u.userID AS userID, u.firstname AS firstname, u.lastname AS lastname, u.othernames AS othernames, u.gender AS gender, u.contactNo AS contactNo, u.rank AS rank, u.depID AS User_depID, u.address AS address, u.email AS email, u.password AS password, d.depID AS depID, CONCAT(u.firstname,' ',u.lastname,' ',u.othernames) AS name, d.dep_name FROM user u INNER JOIN depertments d ON u.depID = d.depID");

    $update_query = mysqli_query($con, "SELECT u.*, d.* FROM user u , depertments d");
                $rst = mysqli_fetch_array($update_query);


  while ($row = mysqli_fetch_array($sql)) 

    {?>
              <tr>
              <td><?php echo $row['userID'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['gender'];?></td>
              <td><?php echo $row['contactNo'];?></td>
              <?php 
                $User_depID = $row['User_depID'];
                $depID = $row['depID'];
                if($User_depID == $depID)
                {
                  ?>
                  <td><?php echo $row['dep_name'];?></td>
                  <?php  
                }
                else
                {
                  ?> 
                  <td><?php echo "no attached depertment";?></td>
                  <?php 
                }
              ?>
              <td><?php echo $row['rank'];?></td>
              <td align="center">
            <!-- action button -->
                  <div class="inputg-group">
                          <div class="">
                            <a class="btn btn-flat" href="#" data-toggle="modal" data-target="#updateModal<?php echo $row['userID']?>"><span data-feather="edit"></span></a>
                            <?php
                              if($row['userID'] == $userid){
                            ?>
                              <a class="btn btn-danger" href="#" disabled="disabled" title="you can not delete self from system"><span data-feather="delete"> Cannot Delete</a>
                            <?php
                            }
                            else{
                            ?>
                              <a class=" btn btn-flat" href="#" data-toggle="modal" data-target="#modal_delete<?php echo $row['userID']?>"><span data-feather='delete'></a>
                            <?php
                              }
                            ?>
                          </div>
                  </td>

              <!-- the delete model -->
             <div class="modal fade" id="modal_delete<?php echo $row['userID']?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">System</h3>
                </div>
                <div class="modal-body">
                  <center><h4>Are you sure you want to delete this User(<?php echo $row['name']?>)?</h4></center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                  <a type="button" class="btn btn-danger" href="applogic/delete_user.php?userID=<?php echo $row['userID']?>">Yes</a>
                </div>
              </div>
            </div>
          </div>  


          <!-- update user modal -->

          <div class="modal fade" id="updateModal<?php echo $row['userID']?>" aria-hidden= "true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="text-center">update user imformation </h3>
                  <button type="button" 
                                      class="close" 
                                      data-dismiss="modal" 
                                      aria-hidden="true">&times;
                              </button>
        <!-- modal heading      -->
                </div>
                <div class="modal-content">
                  <!-- update user form -->

                  <div class="container-fluid">
                  <form action="applogic/update_user.php" id="manage-user" method="POST" enctype="multpart/form-data">

          

          <div class="row">
            
              
            <div class="col-6">
              <div class="form-group">
              <label for="UserID">UserID</label>
              <input type="text" name="userID" id="userID" class="form-control rounded-0" value="<?php echo $row['userID'];?>" placeholder="random user ID" readonly>
            </div>
            <div class="form-group">
              <label for="surname">Sur Name</label>
              <input type="text" name="surname" id="surname" class="form-control rounded-0" value="<?php echo $row['firstname'];?>" required>
            </div>
            <div class="form-group">
              <label for="lastname">last Name(s)</label>
              <input type="text" name="lastname" id="lastname" class="form-control rounded-0" value="<?php echo $row['lastname'];?>" required>
            </div>
            
            <div class="form-group">
              <label for="othernames">Other Names</label>
              <input type="text" name="othernames" id="othernames" class="form-control rounded-0" value="<?php echo $row['othernames'];?>" required>
            </div>
            
            <div class="form-group">
              <label for="gender">Gender</label>
              <select class="form-control rounded-0" name="gender" required>
                <option value="" selected="">Select gender</option>
                <option><strong>male</strong></option>
                <option><strong>female</strong></option>
              </select>

              <!-- <input type="text" name="gender" id="gender" class="form-control rounded-0" value="<?php echo $row['gender'];?>" required> -->
            </div>
            </div>


            <div class="col-6">
              <div class="form-group">
              <label for="Contact">Contact NO </label>
              <input type="text" name="Contact" id="Contact" class="form-control rounded-0" value="<?php echo $row['contactNo'];?>" required>
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control rounded-0" value="<?php echo $row['address'];?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control rounded-0" value="<?php echo $row['email'];?>" required>
            </div>




            <div class="form-group">
              <label for="pass">Password</label>
              <input type="Password" name="pass" id="pass" class="form-control rounded-0" value="<?php echo $row['password'];?>" required>
              <small>dont tourch this field if you dont want to change the password</small>
            </div>

            <div class="form-group">
              <label for="pass">User Type</label>
              <select class="form-control rounded-0" name="rank" required>
                <option value="" selected="">select user rank</option>
                <option><strong>admin</strong></option>
                <option><strong>user</strong></option>
              </select>
            </div>
            <!-- ///////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group" >
                <label for="E_cat">select depe
                rtment:</label>
                  <select class="form-control" 
                          name="dep" id="dep"  
                          required="">
                          <option value="<?php echo  $row['dep_name'];?>" 
                          selected="">
                          </option>
                      
                    <?php
                      $getAll = mysqli_query($con, "SELECT  * from depertments ");
                       while($i = mysqli_fetch_array($getAll))
                      {?>
                      <option value="<?php echo $i['depID']; ?>">
                                  <?php echo  $i['dep_name'];?>  
                      </option>

                     <?php
                       } ?>   
                    </select>
                  </div>
            <!--  -->

            </div>

          </div>
      
      </div>

                </div>
                <div class="modal-footer">
                  <!-- modal footer -->
                    <div class="col">
                      <p>Your editing information about<strong>&nbsp;<?php echo $row['name'];?></strong> </p>
                    </div>
                    <div class="col">
                      <div class="inputg-group text-right">
                        <button class="btn btn-info " id="edit_u" name="edit_u">save</button>
                        <button class=" btn btn-secondary" data-dismiss ="modal">cancel</button>
                      </div>
                      
                      
                    </div>
                </div>
              </form>
                
              </div>
              
            </div>
            
          </div>
            <?php }?>
            
            <?php
                      
             
             // ob_flush();
             mysqli_close($con);
          ?>
                       
      
                        
                        </tr>
                        </tbody>
                    </table>



                    
                            </div>

                  <!-- content on user(user lists table) -->




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
 <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.js"></script>


  <!-- Page level plugins -->
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>

<!-- data table script -->
   <!--  <script>
            $(document).ready(function () {
                $('#dataTables').dataTable();
            });
    </script> -->
  <!-- custom js -->
  <script src="assets/js/custom.js"></script>
  
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

  <!-- data table function -->
      <script>
          $(document).ready(function() {
            $('#dataTables').DataTable({
              "order": [[3 , "asc" ]]
            });
          });
        </script>
</body>
</html>
