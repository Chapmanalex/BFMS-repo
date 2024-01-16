
<?php
// include "dbconnection.php";
include ("../session.php");
include "access.php";
access ('ADMIN');
include "adduser_action.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>add_users</title>
  <link rel="icon" href="../img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">
				
				<!-- Bootstrap core CSS -->
			  <link href="../css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="../css/css/style.css" rel="stylesheet">

			  <!-- Feather JS for Icons -->
			  <script src="../js/feather.min.js"></script>
</head>


<body>
<div class="d-flex"  id="wrapper">

	<!-- Sidebar -->

    <div class="syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <img class="img img-fluid rounded-circle" 
        src="<?php   echo '../'.$userprofile ?>" 
        width="120">
        <br>
        <h5><?php echo $username ?></h5>
        <p><?php echo $useremail ?></p>

        </div>

      <div class="sidebar-heading">Management</div>

      <div class="list-group list-group-flush">
<!-- side-bar dashsboard -->
        <a href="../index.php" class="list-group-item list-group-item-action">
        <span data-feather="home"></span> Dashboard</a>

<!-- sidebar-income -->
        <a href="../income.php" class="list-group-item list-group-item-action ">
        	<span data-feather="pocket"></span>  My-Income </a>

<!-- side-bar budgets -->
        <a href="../budget.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My-Categories </a>

<!-- side-bar expenses -->
		<a href="../expenses.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> My-Expenses </a>


        <a href="../budgetplans.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> Budgets </a>


<!-- side-bar departments -->
		<a href="../departments.php" class="list-group-item list-group-item-action "><span data-feather="briefcase"></span> My-Departments </a>

<!-- side-bar users -->
		<a href="../users.php" class="list-group-item list-group-item-action "><span data-feather="users"></span> Users </a>

      </div>


      <div class="sidebar-heading">Settings </div>

      <div class="list-group list-group-flush">

      	<!-- side-bar profile -->
<!--         <a href="../profile.php" class="list-group-item list-group-item-action "><span data-feather="edit"></span> Profile</a>
 -->
        <!-- side-bar system settings -->
        <a href="../system/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> System Settings</a>

        <!-- side-bar logout -->
        <a href="../logout.php" class="list-group-item list-group-item-action "><span data-feather="log-out"></span> Logout</a>
      </div>
        <hr>
      <div class="sidebar-heading">communication </div>
      <div class="list-group list-group-flush">
        <a href="../noti/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> text </a>
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
                <img class="img img-fluid rounded-circle" src="<?php echo '../' .$userprofile ?>" width="25"><?php echo $rank ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../profile.php">Your Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>




<div class="container-fluid ">
  <h3 class="mt-4 ">Add users</h3>

  <div class="row">
    
    <div class="col-md-12">
      <!-- card for dashbord elements -->
      <div class="card ">
        <div class="card-body">

        	<div class="container-fluid">
        		
        	<form action="" id="manage-user" method="POST" enctype="multipart/form-data">

				  

				  <div class="row">
				  		
				  	<div class="col-6">
<!-- 				  		<div class="form-group">
							<label for="UserID">UserID</label>
							<input type="text" name="UserID" id="UserID" class="form-control rounded-0" value="" placeholder="random user ID" readonly>
						</div> -->
						<div class="form-group">
							<label for="surname">Sur Name</label>
							<input type="text" name="surname" id="surname" class="form-control rounded-0" value="" required>
						</div>
						<div class="form-group">
							<label for="lastname">last Name(s)</label>
							<input type="text" name="lastname" id="lastname" class="form-control rounded-0" value="" required>
						</div>
						
						<div class="form-group">
							<label for="othernames">Other Names</label>
							<input type="text" name="othernames" id="othernames" class="form-control rounded-0" value="" required>
						</div>
						
						<div class="form-group">
							<label for="gender">Gender</label>
              <select class="form-control rounded-0" id="gender" name="gender" required>
                <option value="" selected="">Select gender</option>
                <option><strong>male</strong></option>
                <option><strong>female</strong></option>
              </select>
							<!-- <input type="text" name="gender" id="gender" class="form-control rounded-0" value="" required> -->
						</div>

            <!-- ////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group" >
                <label for="E_cat">select department:</label>
                  <select class="form-control" 
                          name="dep" id="dep">
                          <option value="" 
                          selected="">Choose Department
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


				  	<div class="col-6">
				  		<div class="form-group">
							<label for="Contact">Contact NO </label>
							<input type="text" name="Contact" id="Contact" class="form-control rounded-0" value="" required>
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" id="address" class="form-control rounded-0" value="" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control rounded-0" value="" required>
						</div>

						<div class="form-group">
							<label for="pass">Password</label>
							<input type="Password" name="pass" id="pass" class="form-control rounded-0" value="" required>
						</div>

            <div class="form-group">
              <label for="pass">User Type</label>
              <select class="form-control rounded-0" name="rank" required>
                <option value="" selected="">select user rank</option>
                <option><strong>admin</strong></option>
                <option><strong>user</strong></option>
              </select>
            </div>

            <!-- //////////////////////////////////////////////////////////////////////////// -->
              

				  	</div>

				  </div>
          
			</form>

        	</div>
          
        </div>
        <!--  -->

			<div class="card-footer ">
				<div class="col-md-12 ">
					<div class="row">
					<button class="btn btn-sm btn-info mr-4" form="manage-user"> <strong>SAVE</strong></button>
          <button class="btn btn-secondary" onclick="history.back()"><strong>BACK</strong></button>
					<!-- <a class="btn btn-sm btn-secondary" href="../applogic/#">Cancel</a> -->
					</div>
				</div>
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
  <script src="../js/jquery.slim.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/Chart.min.js"></script>


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
