<?php



include ("session.php");
include "maintanance/access.php";
// access ('ADMIN');
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
	<title>D-reports</title>
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
<?php if (access ('ADMIN' , false )): ?>
        <a href="income.php" class="list-group-item list-group-item-action ">
        	<span data-feather="pocket"></span>  My-Income </a>
<?php endif; ?>
<!-- side-bar budgets -->
<?php if (access ('ADMIN' , false )): ?>
        <a href="budget.php" class="list-group-item list-group-item-action "><span data-feather="credit-card"></span> My-Categories </a>
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
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25"><?php echo $rank; ?>
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
            <div class="col">
            <h3 class="">Depertment reports</h3>
          </div>

          <!-- my category search sport -->
          <div class="col">
           <?php if (access ('ADMIN' , false )): ?> 
          	<form action="" method="GET">
          		<div class="input-group mb-3">
          			<label><strong>Depertment</strong></label>
          			<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="search">
          			<button type="submit" class="btn btn-info">search</button>
          		</div>
          		
          	</form>
          <?php endif; ?>
           </div>
          <!-- print button  -->
           <div class="col text-right">
          	<button class="btn btn-info" onclick="window.print();">
          		<span data-feather ="printer"></span>Print report
          	</button>
          </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row mb-3 mt-3" style="margin-left: 4px; height: 100px; background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);">
           
          </div>
<!-- start of big class body card body-->
<div class="row">
	<!-- colmn for category summaries -->
	<div class="col-4 rounded-5">
		<!-- card for category sumaries -->
		<div class="card card-outline">
			<?php if (access ('ADMIN' , false )): ?>
				<h4 class="text-center mt-2 text-decoration-underline">Depertment officer Detailes </h4>
			<?php  endif; ?>
      <!-- ///////// -->
      <?php if (access ('USER' , false )): ?>
        <?php 
          $d = mysqli_query($con, "SELECT d.dep_name , d.depID , u.depID FROM depertments d , user u WHERE d.depID = u.depID AND u.userID = '$userid'");
          $r = mysqli_fetch_array($d);
          ?>
          <div class="mt-3 ml-2">
            <?php echo " <h4>".$r['dep_name']. "</h4>"; ?>
          </div>
      <?php endif; ?>

			<div class="card-body">
				<!-- my department sumary -->
				<div class="row">
					<div class="col">

          <!-- /////////////////////////////////// -->
          <!-- user depaertment details -->
          <?php if (access ('USER' , false )): ?>
            <?php 
                $department = mysqli_query($con ,"SELECT * FROM depertments WHERE depID = '$dep'");
                $_r = mysqli_fetch_array($department);
                ?>
                <table class="border-less table-hover">
                  <tr>
                    <td>
                      <p>depertment ID:&nbsp; </p> 
                    </td>
                    <td>
                      <p><strong> <?php echo $_r['depID'] ?></strong></p>
                    </td>
                  </tr>
                  <!-- /////////// -->
                  <tr>
                    <td>
                      <p>depertment Name:&nbsp; </p> 
                    </td>
                    <td>
                      <p><strong> <?php echo $_r['dep_name'] ?></strong></p>
                    </td>
                  </tr>
                    <!-- ////// -->
                    <tr>
                      <td>
                        <p>Officer Name:&nbsp; </p>  
                      </td>
                      <td>
                        <p><strong> <?php echo $username ?></strong></p>
                      </td>
                    </tr>
                  <tr>
                    <td>
                      <p> Depertment Description:&nbsp; </p>
                    </td>
                    <td>
                      <p><strong> <?php echo $_r['description']?></strong></p>
                    </td>
                  </tr>
                </table>


          <?php endif; ?>

           
          <?php if (access ('ADMIN' , false )): ?> 
					<?php 
					if (isset($_GET['search'])) 
					{
						# code...
						$filter = $_GET['search'];
						$sql = mysqli_query($con, "SELECT d.depID, d.dep_name , u.* , CONCAT(u.firstname, ' ' , u.lastname,' ',u.othernames ) as username1 FROM depertments d , user u  WHERE d.depID = u.depID AND d.dep_name LIKE '%$filter%' group by u.depID");
						//$sql_run = mysqli_query($con , $sql);

						// checking if there's data 
						if (mysqli_num_rows($sql) > 0) 
						{
							# code...
							foreach ($sql as $item )
							{ ?>

                          		<!-- # code... -->
                <table class="border-less table-hover">
                  <tr>
                    <td><p>depertment Name :&nbsp; </p> </td><td><p><strong> <?php echo $item['dep_name'] ?></strong></p></td></tr>
                    <!-- ////// -->
                    <tr><td><p>Officer Name :&nbsp; </p> </p> </td><td><p><strong> <?php echo $item['username1'] ?></strong></p></td>
                  </tr>
                  <tr><td><p> Gender:&nbsp; </p></td><td><strong> <?php echo $item['gender']?></strong></td>
                  </tr>
                  <tr>
                    <td><p>Address :&nbsp; </p></td><td><strong><?php echo $item['address']?></strong></td>
                  </tr>
                  <tr>
                    <td><p>Email :&nbsp; </p></td><td><strong><?php echo $item['email']?></strong></td>
                  </tr>
                  <tr><td><p>Contact number :&nbsp; </p></td><td><p><strong><?php echo $item['contactNo']?></strong></p></td></tr>
                  <tr><td> <p>User Rank:&nbsp; </p></td><td><p><strong><?php echo $item['rank']?></strong></p></td></tr>
                </table>
						
           
								<?php
							}
						}
						else
						{ ?>

							<div> <strong> there are no reports on that<br> Depertment </strong></div>

							<?php
						}
					}

					?>
          <?php endif;?>

				</div>

					<!-- <div class="col-md-7 col-xl-7">
						<p>Name:</p>
						<p><strong><?php echo $fetch['firstname']." ".substr($fetch['middlename'], 0, 1).". ".$fetch['lastname']?></strong></p>
					</div> -->
				</div>


			</div>
		</div>
	</div>


	<div class="col-6 rounded-5">
		<!-- card for category sumaries -->
		<div class="card card-outline">
			<div class="card-header">
				<h4>Depertment Expenses</h4>
			</div>
			<div class="card-body">
				<!-- category expenses sumaries table -->

				<div class="table-responsive">
                   <table class="table table-striped table-borderless table-hover" id="dataTables">
                   <thead>
                         
                   <th>Item</th>
                   <th>Description</th>
                   <th>Amount spent</th>
                   <th>Date</th>
                   </tr>

                   </thead>
            <?php if (access ('ADMIN' , false )): ?> 
                    <tbody>
  
                      
        <?php
        	//$selected = 
        	if (isset($_GET['search'])) 
        	{
        		# code...
        		$filter2 = $_GET['search'];
        		$sql = mysqli_query($con, "SELECT d.* , e.* from depertments d , expenses e WHERE d.depID = e.depID AND d.dep_name LIKE '%$filter2%' ");

        		if (mysqli_num_rows($sql) > 0 ) 
        		{
        			# code...
        			foreach ($sql as $item2) 
        			{
        				# code...
        				?>
        				<tr>
              <td><?php echo $item2['item']?></td>
              <td><?php echo $item2['E_description']?></td>
              <td><?php echo number_format((float)$item2['E_amount'], 2, '.', '')?></td>
			        <td><?php echo $date=DATE_FORMAT(new DateTime($item2['E_date']),'d-M-Y') ?></td>
        				</tr>
      				<?php
        			}
        		}
        		else
        		{
        			?>
        			<tr><td colspan="4"> No activities found for this Category </td></tr>

        			<?php
        		}

        	}

        	?>

              

          <?php 
             ob_flush();
          ?>
                        
      </tbody>
    <?php endif; ?>
    <?php if (access ('USER' , false )): ?> 

      
      <?php
        $sql = mysqli_query($con, "SELECT d.* , e.* from depertments d , expenses e WHERE d.depID = e.depID AND d.depID = '$dep' ");
        while ($row = mysqli_fetch_array($sql)) 
        {
          ?>
      <tbody>
      <tr>
      <td><?php echo $row['item']?></td>
      <td><?php echo $row['E_description']?></td>
      <td><?php echo number_format((float)$row['E_amount'], 2, '.', '')?></td>
      <td><?php echo $date=DATE_FORMAT(new DateTime($row['E_date']),'d-M-Y') ?></td>
      </tr>
      </tbody>
      <?php 
          # code...
        }?>

    <?php endif; ?>
    </table>
                    
            </div>
				
			</div>
		</div>
	</div>
  <div class="col-2">
    <div class="card">
      <div class="card-body">
        <div class="card-title"><h4>Dep stats </h4></div>
        <?php if (access ('USER' , false )): ?> 

          <div class="row mt-2">
            <div class="col">Funds</div>
            <div class="col">
            UGx ....
            </div>
          </div>
          <!-- ............................................. -->
          <div class="row mt-2">
            <div class="col">Spent</div>
            <div class="col">
            UGx ....
            </div>
          </div>

          <!-- ..................................................... -->
          <div class="row mt-2">
            <div class="col">balance</div>
            <div class="col">
            UGx ....
            </div>
          </div>

          <?php endif; ?>        
      </div>
      
    </div>

  </div>
</div>

<!-- Advanced Tables -->
<div class="panel panel-default">
     <div class="panel-heading">
     </div>
            
            <div class="panel-body">

            
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
