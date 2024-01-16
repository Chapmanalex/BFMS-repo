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
	<title>B-reports</title>
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
                <a href="index.php" class="list-group-item list-group-item-action">
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
            <h3 class="">Budget  reports</h3>
          </div>

          <!-- my category search sport -->
          <div class="col">
          	<?php if (access('ADMIN' , false)):?> 
          	<form action="" method="GET">
          		<div class="input-group mb-3">
          			<label><strong>Budget &nbsp; </strong></label>
          			<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="search">
          			<button type="submit" class="btn btn-info">search</button>
          		</div>
          	</form>
          <?php endif; ?>

          </div>
          <!-- print button  -->
          <div class="col text-right">
            <form action="pdfs/budgetreportpdf.php" method="POST" target="_blank">
              <button class="btn btn-info">
              <span data-feather ="printer"></span>Print report
              </button>
            </form>
          	
          </div>
          </div>
        </div>
        <div class="card-body">
<!-- start of big class body card body-->

<div class="row">
	<!-- colmn for budget summaries -->
	<div class="col-4 rounded-5">
		<!-- card for budget sumaries -->
		<div class="card card-outline">
			<div class="card-header">
				<h4>Budget sumary</h4>
			</div>
			<div class="card-body">
				<!-- my budget sumary -->


        <?php if (access('ADMIN' , false)): ?>
				<div class="row">
					<div class="col">
					<?php 
					if (isset($_GET['search'])) 
					{
						# code...
						$filter = $_GET['search'];
						$sql = mysqli_query($con, "SELECT i.expenseID, s.curentbalance,  s.budget_amount AS amount, s.budgetname, SUM(i.E_amount) AS amount_spent, s.startdate , s.enddate , DATEDIFF(s.enddate, NOW()) AS remaining_days
           					FROM expenses i, budgets s  WHERE i.budgetID = s.budgetID AND s.budgetname LIKE '%$filter%' group by s.budgetID");
						//$sql_run = mysqli_query($con , $sql);

						// checking if there's data 
						if (mysqli_num_rows($sql) > 0) 
						{
							# code...
							foreach ($sql as $item )
						{ ?>
						
            <!-- # code... -->

						<p>Budget name:&nbsp;   <strong> <?php echo $item['budgetname'] ?></strong></p> 
						<br>
						<p> budget:&nbsp; <strong> <?php echo $item['amount']?></strong></p>
						<br>
						<?php 
						// $diff = diff($item['amount'], $item['amount_spent']);
						echo '<p> current balance &nbsp;';   echo'</p>';
            echo '<p class ="badge badge-success">';
            echo $item['curentbalance']; 
            echo'</p>';

            

						// if($diff < 0 )
						// {
						// echo'<p class="badge badge-danger" title="You have over spent
      //                   '.$item['budgetname'].'  budget">'. number_format((float)($diff), 2, '.', '') . '</p>';
      //                   }
      //                   if($diff == 0 )
      //                   {
      //                   echo'<p class="badge badge-warning" title="You have no budget for 
      //                   '.$item['budgetname'].' budget">'. number_format((float)($diff), 2, '.', '') . '</p>';
      //                   }
      //                   if($diff > 0 ){
      //                   echo '<p class="badge badge-info" title="You are within 
      //                   '.$item['budgetname'].'  budget"">'.number_format((float)($diff), 2, '.', '') . '</p>'; 
      //               	}
                                       

                       
							
						?>
					
					<br>
					<p>Start Date :&nbsp; <strong><?php echo $item['startdate']?></strong></p>
					<br>
					<p>End Date :&nbsp; <strong><?php echo $item['enddate']?></strong></p>

					<br>
					<p>period left :&nbsp; <strong><?php echo $item['remaining_days']?> days</strong></p>



								<?php
							}
						}
						else
						{ ?>

							<div> <strong> there are no activities<br> yet for this budget </strong> </div>

							<?php
						}
					}

					?>

				</div>

					<!-- <div class="col-md-7 col-xl-7">
						<p>Name:</p>
						<p><strong><?php echo $fetch['firstname']." ".substr($fetch['middlename'], 0, 1).". ".$fetch['lastname']?></strong></p>
					</div> -->
				</div>
      <?php endif;?>

      <?php if (access('USER' , false)): ?>


          <div class="row">
          <div class="col">
          <?php 
            $sql = mysqli_query($con, "SELECT i.expenseID,  s.budget_amount AS amount, s.budgetname, SUM(i.E_amount) AS amount_spent, s.startdate , s.enddate , DATEDIFF(s.enddate, NOW()) AS remaining_days
                    FROM expenses i, budgets s  WHERE i.budgetID = s.budgetID AND i.depID = '$dep' group by s.budgetID");
            //$sql_run = mysqli_query($con , $sql);

            // checking if there's data 
            if (mysqli_num_rows($sql) > 0) 
            {
              # code...
              foreach ($sql as $item )
            { ?>
            
            <!-- # code... -->

            <p>Budget name:&nbsp;   <strong> <?php echo $item['budgetname'] ?></strong></p> 
            <br>
            <p>Budget:&nbsp; <strong> <?php echo $item['amount']?></strong></p>
            <br>
            <?php 
            $diff = diff($item['amount'], $item['amount_spent']);
            echo '<p> current balance &nbsp;'; 
            if($diff < 0 )
            {
            echo'<p class="badge badge-danger" title="You have over spent
                        '.$item['budgetname'].'  budget">'. number_format((float)($diff), 2, '.', '') . '</p>';
                        }
                        if($diff == 0 )
                        {
                        echo'<p class="badge badge-warning" title="You have no budget for 
                        '.$item['budgetname'].' budget">'. number_format((float)($diff), 2, '.', '') . '</p>';
                        }
                        if($diff > 0 ){
                        echo '<p class="badge badge-info" title="You are within 
                        '.$item['budgetname'].'  budget"">'.number_format((float)($diff), 2, '.', '') . '</p>'; 
                      }
                                       

                         echo'</p>';
              
            ?>
          
          <br>
          <p>Start Date :&nbsp; <strong><?php echo $item['startdate']?></strong></p>
          <br>
          <p>End Date :&nbsp; <strong><?php echo $item['enddate']?></strong></p>

          <br>
          <p>period left :&nbsp; <strong><?php echo $item['remaining_days']?> days</strong></p>



                <?php
              }
            }
            else
            { ?>

              <div> <strong> you have not used your budget yet</strong></div>

              <?php
            }
          ?>

        </div>

          <!-- <div class="col-md-7 col-xl-7">
            <p>Name:</p>
            <p><strong><?php echo $fetch['firstname']." ".substr($fetch['middlename'], 0, 1).". ".$fetch['lastname']?></strong></p>
          </div> -->
        </div>


      <?php endif; ?>


			</div>
		</div>
	</div>


	<div class="col-8 rounded-5">
		<!-- card for category sumaries -->
		<div class="card card-outline">
			<div class="card-header">
				<h4>budget expenses </h4>
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

                    <tbody>
  
          <?php if (access('ADMIN' , false)): ?>       
        <?php
        	//$selected = 
        	if (isset($_GET['search'])) 
        	{
        		# code...
        		$filter2 = $_GET['search'];
        		$sql = mysqli_query($con, "SELECT c.* , e.* from budgets c , expenses e WHERE c.budgetID = e.budgetID AND c.budgetname LIKE '%$filter2%'");

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

<!--               	<?php  $days = $row['remaining_days'];
                      if ($days < 0) {?>
                       <td><?php echo '<div class="badge badge-danger" title=" ">           <!--'.$row['CategoryName'].'-->expired </div>'; ?></td>
                <?php }
                    elseif ($days <= 10) { ?>
                   <td><?php echo '<div class="badge badge-warning" title=" ">
                    '.$row['remaining_days'].' remaining </div>'; ?></td>

                <?php }else {?>
                <td><?php echo $row['remaining_days'] ?></td>
                    <?php }?>   -->            
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

          <?php endif; ?>

          <?php if (access('USER' , false)): ?>       
        <?php
          //$selected = 
            $sql = mysqli_query($con, "SELECT c.* , e.* from budgets c , expenses e WHERE c.budgetID = e.budgetID AND e.depID = '$dep'");

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

<!--                <?php  $days = $row['remaining_days'];
                      if ($days < 0) {?>
                       <td><?php echo '<div class="badge badge-danger" title=" ">           <!--'.$row['CategoryName'].'-->expired </div>'; ?></td>
                <?php }
                    elseif ($days <= 10) { ?>
                   <td><?php echo '<div class="badge badge-warning" title=" ">
                    '.$row['remaining_days'].' remaining </div>'; ?></td>

                <?php }else {?>
                <td><?php echo $row['remaining_days'] ?></td>
                    <?php }?>   -->            
                </tr>


                <?php
              }
            }
            else
            {
              ?>
              <tr><td colspan="4"> No activities found for your budget </td></tr>

              <?php
            }
          ?>
              

          <?php 
             ob_flush();
          ?>

          <?php endif; ?>
      </tbody>
    </table>
                    
            </div>
				
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
