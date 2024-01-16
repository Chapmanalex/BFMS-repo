<?php 
include "../session.php";
include "../maintanance/access.php";
access ('ADMIN');
?>
<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>system</title>
  <link rel="icon" href="../img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">
				
				<!-- Bootstrap core CSS -->
			  <link href="../css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="../css/css/style.css" rel="stylesheet">

			  <!-- Feather JS for Icons -->
			  <script src="../js/feather.min.js"></script>
</head>


<body>
<div class="d-flex" id="wrapper">

	<!-- Sidebar -->

    <div class="syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <img class="img img-fluid rounded-circle" 
        src="<?php  echo '../' .$userprofile ?>" 
        width="120">
       <h5><?php   echo $username ?></h5> 
        <p><?php   echo $useremail ?></p>
        
      </div>

      <div class="sidebar-heading">Management</div>

      <div class="list-group list-group-flush">
<!-- side-bar dashsboard -->
        <a href="../index.php" class="list-group-item list-group-item-action ">
        <span data-feather="home"></span> Dashboard</a>

<!-- sidebar-income -->
        <a href="../income.php" class="list-group-item list-group-item-action ">
        	<span data-feather="pocket"></span>  My-Income </a>

<!-- side-bar budgets -->
        <a href="../budget.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My-Categories </a>

<!-- side-bar expenses -->
		<a href="../expenses.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> My-Expenses </a>

<?php if (access ('ADMIN' , false )): ?>
        <a href="../budgetplans.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> Budgets </a>
<?php endif; ?>

<!-- side-bar departments -->
		<a href="../departments.php" class="list-group-item list-group-item-action "><span data-feather="briefcase"></span> My-Departments </a>

<!-- side-bar users -->
		<a href="../users.php" class="list-group-item list-group-item-action "><span data-feather="users"></span> Users </a>

      </div>


      <div class="sidebar-heading">Settings </div>

      <div class="list-group list-group-flush">

      	<!-- side-bar profile -->
   <!--      <a href="../profile.php" class="list-group-item list-group-item-action "><span data-feather="edit"></span> Profile</a> -->

        <!-- side-bar system settings -->
        <a href="index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> System Settings</a>

        <!-- side-bar logout -->
        <a href="../logout.php" class="list-group-item list-group-item-action "><span data-feather="log-out"></span> Logout</a>
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




<div class="container-fluid">
  <!-- <h3 class="mt-4 ">System Settings</h3> -->


  <div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h5 class="card-title">System Information</h5>
      <!-- <div class="card-tools">
        <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
      </div> -->
    </div>
    <div class="card-body">
      <form action="" id="system-frm">
        <div id="msg" class="form-group"></div>

        <div class="form-group">
              <label for="name" class="control-label">System Name</label>
              <input  type="text" 
                      class="form-control form-control-sm" 
                      name="name" id="name" value="">
        </div>

        <div class="form-group">
            <label for="short_name" class="control-label">System Short Name</label>
            <input  type="text" 
                    class="form-control form-control-sm" 
                    name="short_name" id="short_name" 
                    value="">
        </div>

        <div class="form-group">
            <label for="" class="control-label">About Us</label>
            <textarea name="about_us" id="" cols="30" rows="2" 
                      class="form-control summernote">
                      <?php echo  is_file(base_app.'about.html') ? file_get_contents(base_app.'about.html') : "" ?>
                        
            </textarea>
        </div>

      <div class="form-group">
        <label for="" class="control-label">System Logo</label>
        <div class="custom-file">
                <input  type="file" 
                        class="custom-file-input rounded-circle" 
                        id="customFile" name="img" 
                        onchange="displayImg(this,$(this))">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
        </div>

        <div class="form-group d-flex justify-content-center">
        <img  src="<?php echo validate_image($_settings->info('logo')) ?>" 
              alt="" id="cimg" 
              class="img-fluid img-thumbnail">
      </div>
      <div class="form-group">
        <label for="" class="control-label">Potal Cover</label>
        <div class="custom-file">
                <input type="file" class="custom-file-input rounded-circle" id="customFile" name="cover" onchange="displayImg2(this,$(this))">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
      </div>
      <div class="form-group d-flex justify-content-center">
        <img src="<?php echo validate_image($_settings->info('cover')) ?>" alt="" id="cimg2" class="img-fluid img-thumbnail">
      </div>
      </form>
    </div>
    <div class="card-footer">
      <div class="col-md-12">
        <div class="row">
          <button class="btn btn-sm btn-primary" form="system-frm">Update</button>
        </div>
      </div>
    </div>

  </div>
</div>

  
  
  <!-- container fluid -->

</div>
  
 
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
