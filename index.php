<?php
include "session.php";
include "maintanance/access.php";
include "noti/connection/DB.php";
include "myquerries.php";

function diff($a=0, $b=0)
{
  $c = ($a - $b);
  return $c;
}
?>
 <!-- // querry for pie chart  for admin -->  
<?php if (access('ADMIN' , false)): ?>
<?php
$catnam =  mysqli_query($con ,"SELECT CategoryName FROM categories") ;
$catamount = mysqli_query($con,"SELECT c.*, SUM(e.E_amount) as amount FROM categories c , expenses e WHERE e.catID = c.catID group by c.CategoryName");
?>
<?php endif; ?>

<!-- // querry for pie chart  for user --> 
<?php if (access('USER' , false)): ?>
<?php
$catnam =  mysqli_query($con ,"SELECT CategoryName FROM categories") ;
$catamount = mysqli_query($con,"SELECT c.*, SUM(e.E_amount) as amount FROM categories c , expenses e WHERE e.catID = c.catID AND e.depID = '$dep' group by c.CategoryName");
?>
<?php endif; ?>

<!-- // querry for the line graph admin -->
<?php if (access ('ADMIN' , false)):?>
<?php
$exp_date  = mysqli_query($con ,"SELECT E_date FROM expenses group by E_date");
$exp_cash = mysqli_query($con , "SELECT E_amount FROM expenses group by E_date");
?>
<?php endif;?>
<!-- // querry for the line graph user -->
<?php if (access ('USER' , false)):?>
<?php
$exp_date  = mysqli_query($con ,"SELECT E_date FROM expenses WHERE userID = '$userid' group by E_date");
$exp_cash = mysqli_query($con , "SELECT E_amount FROM expenses WHERE userID = '$userid' group by E_date");?>
<?php endif;?>

<!-- query for the bar graph for admin -->
<?php if (access('ADMIN' , false)):?>
<?php

 $bar = mysqli_query($con, "SELECT dep_name FROM depertments");
$barb = mysqli_query($con,"SELECT b.budget_amount as amount ,b.depID,d.dep_name, d.depID FROM budgets b, depertments d WHERE d.depID = b.depID ");

?>
<?php endif; ?>
<!-- query for the bar graph for user -->

<?php if (access('USER' , false)):?>
<?php
$bar = mysqli_query($con, "SELECT dep_name FROM depertments");
$barb = mysqli_query($con,"SELECT b.budget_amount as amount ,b.depID, d.depID FROM budgets b, depertments d WHERE b.depID = d.depID ");
?> 
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>Home</title>
  <link rel="icon" href="img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">

        <!-- FONTAWESOME STYLES-->
        <link href="css/font-awesome.css" rel="stylesheet" />
				
				<!-- Bootstrap core CSS -->
			  <link href="css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="css/css/style.css" rel="stylesheet">

			  <!-- Feather JS for Icons -->
			  <script src="js/feather.min.js"></script>
        <!-- pie chart script -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- noti plugins -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="noti/assets/js/jquery.min.js"></script>
        <script src="noti/assets/js/bootstrap.min.js"></script>



        <!-- pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp -->

</head>
<body>
<div class="d-flex" id="wrapper">

	<!-- Sidebar -->

    <div class=" syd border-right" id="sidebar-wrapper">
    	<!-- user session display -->
      <div class="user">
        <div class="user-img">
          <a href="profile.php"><img class="img img-fluid rounded-circle" 
        src="<?php  echo $userprofile ?>" 
        width="120"></a>
        </div>
        
        <!-- user Id session -->
        <div class="user-cr">
          <h5><?php echo $username ?></h5>
          <p><?php echo $useremail ?></p>
        </div>
        
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
        <a href="system/index.php" class="list-group-item list-group-item-action "><span data-feather="hard-drive"></span> System Settings</a>

        <!-- side-bar logout -->
        <a href="logout.php" class="list-group-item list-group-item-action ">
        <span data-feather="log-out"></span> LogOut</a>
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

        <?php 
        $dep_name = mysqli_query ($con, "SELECT * FROM depertments WHERE depID = '$dep' ");
            $result= mysqli_fetch_array($dep_name); ?>  
            
            
               <div class="card ml-4 mt-4" style="width: 100%; border: none;">
              <div class="row">
                  <div class="col-9">
                    <h4>The Expenses management System </h4>
                  </div>
            <?php
                  if (empty($result)) 
            {
              echo '<h5 class="alert alert-info"> no department </p>';
            }
            else
            {?>
              <div class="col-3 " style="text-align: right; padding-right: 25px;">
              <h5 class="alert alert-info " style=" "><?php echo $result['dep_name'] ; ?></h5>
              </div>
            <?php };?>
              </div>
          </div>
                
            
            




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
  <div class="row mt-4">
    <div class="col-md-4">
      <h3 class=" ">Dashboard</h3>
    </div>
    <div class="col-md-8">

      <!-- notification button/////....................................  -->

      <div class="text-right" style="" id="toastBox">
        <!-- <a href="#" class="btn btn-flat dropdown-toggle" data-target = "dropdown" >notifications<span data-feather = "bell"></span> <span class="label label-pill label-danger count" style="position: absolute;top: -10px; right: 10px; padding: 5px 10px; border-radius: 50%;background: red; color: white;">0</span></a> -->
      </div>














    </div>
    
  </div>
  
  <div class="row">
    <?php if (access ('ADMIN' , false )): ?>
    <div class="col-md-3">
      <!-- card for dashbord elements -->
      <div class="card d-cards" style="border-radius: 25px; background-color: beige; ">
            <?php 
            $total_income = mysqli_query($con , "SELECT SUM(I_amount) AS total_income FROM income_tb");
            $income = mysqli_fetch_array($total_income);
            ?>
        
        <div class="card-body">
        <!-- llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
          <h4>Income ; </h4>
          <div class="text-right"><strong><?php echo "UGx.". $income['total_income']. "/="?></strong></div>
        
        <!-- llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
          
      </div>
        <div class="card-footer">
          <div>
            <a href="" class="btn btn-flat btn-block">
              <h5>company incomes</h5>
            </a>
          </div>
        </div>
      </div>

    </div>
  <?php endif ; ?>
    <!-- ////////////////////////////////////////////////////////////////////// -->

    <div class="col-md-3">
      <!-- card for dashbord elements -->
      <div class="card d-cards"
           style="border-radius: 25px; 
                  background-color: beige;">

       <?php if (access('USER' , false)): ?>
        <?php
         $total_budget = mysqli_query($con , "SELECT SUM(budget_amount) AS total_budget FROM budgets WHERE depID = '$dep'");
        $budget = mysqli_fetch_array($total_budget); 

        ?>

       <?php endif; ?>

       <?php if (access('ADMIN' , false)): ?>
        <?php 

        $total_budget = mysqli_query($con , "SELECT SUM(budget_amount) AS total_budget FROM budgets");
        $budget = mysqli_fetch_array($total_budget);


        ?>
         <?php endif; ?>
        
        <?php if (access('USER' , false)): ?>
         
        <div class="card-body">

          <h4>depertment Budget ; </h4>
          <div class="text-right">
            <strong><?php echo "UGx.". $budget['total_budget']. "/="?></strong>
          </div>
          
        </div>
        <div class="card-footer">
          <a href="" class=" btn btn-flat btn-block"><h5>depertment Budget</h5></a>
          
        </div>
      <?php endif; ?>


      <?php if (access('ADMIN' , false)): ?>
         
        <div class="card-body">

          <h4>Total Budget ; </h4>
          <div class="text-right">
            <strong><?php echo "UGx.". $budget['total_budget']. "/="?></strong>
          </div>
          
        </div>
        <div class="card-footer">
          <a href="" class=" btn btn-flat btn-block"><h5>Company Budgets</h5></a>
          
        </div>
      <?php endif; ?>
      </div>

    </div>
    <?php if (access ('USER' , false )): ?>
      <div class="col-md-6">
        <!-- lkfytdckl;k'ojihugyjvhkb/hhhhhhhhhhhhhhhhhhhhhhhhuy;;;;;;;;;;;;ihkhifuj -->
        <!-- other user info on dashbord here -->






      </div>
    <?php endif; ?>
    <!-- ///////////////////////////////////////////////////////////////////////// -->

    <div class="col-md-3">
      <!-- card for dashbord elements -->
      <div class="card d-cards" style="border-radius: 25px; background-color: beige;" >
        <?php if (access ('ADMIN' , false )): ?>
              <?php
          $total_expenses = mysqli_query($con , "SELECT SUM(E_amount) AS total_expenses FROM expenses");?>
        <?php  endif; ?>

        <!-- user query -->
        <?php if (access ('USER' , false )): ?>
          <?php
          $total_expenses = mysqli_query($con , "SELECT SUM(E_amount) AS total_expenses FROM expenses WHERE userID = '$userid'");?>
        <?php  endif; ?>
        <?php
          $result = mysqli_fetch_array($total_expenses);
        ?>
        <?php if (access('ADMIN', false)):?>
        <div class="card-body">
          <h4> Total expenditures ; </h4>
          <div class="text-right">
            <strong><?php echo "UGx.". $result['total_expenses']. "/="?></strong>
          </div>          
        </div>
        <div class="card-footer">
          <a href="" class="btn btn-flat btn-block"><h5> Company Expenses </h5></a>
          
        </div>
      <?php endif;?>
      <?php if (access('USER', false)):?>
        <div class="card-body">
          <h4> Depertment expenditures ; </h4>
          <div class="text-right">
            <strong><?php echo " Total = UGx.". $result['total_expenses']. "/="?></strong>
          </div>          
        </div>
        <div class="card-footer">
          <a href="" class="btn btn-flat btn-block"><h5> Depertment Expenses </h5></a>
          
        </div>
      <?php endif;?>
      </div>

    </div>
    <!-- ///////////////////////////////////////////////////////////////////////////////// -->
    <?php if (access ('ADMIN' , false )): ?>
  <div class="col-md-3">
      <!-- card for dashbord elements -->
    <div class="card d-cards"  style="border-radius: 25px; background-color: #FA6565;">
      <?php 
      $dif = diff($budget['total_budget'] , $income['total_income']);
       ?>
      <div class="card-body">
        <h4>Budget Deficit ;</h4>
        <div class="text-right">
          <?php 
                if ($dif > 0)
                {
                 // echo $deft['t_amount'];
                 echo "<h5> <strong> UGx." .$dif."/=</h5></strong>" ;
                  # code...
                }
                else
                {
                  echo "0";
                }
          ?>
        </div>
      </div>
        <div class="card-footer">
          <a href="" class="btn btn-flat btn-block" onclick ="showtoast()"><h5>budget out side income</h5></a>
        </div>
      </div>

    </div>
  <?php endif; ?>
    <!--//////////////////////////////////////////////////////////////////////////////////////-->

</div>
<?php if (access('ADMIN', false)): ?>
  <div class="row mt-2">
    <div class="col-md-12">
    <div class="card card-outline dasht">
      <div class="card-body">
        <div class="card-title">
         bar graph showing depertments and there budgets 
        </div>
        <canvas id="exp_bar" height = "70"></canvas>
     </div>
     
    </div>
  </div>
</div>

<?php endif;  ?>
  <!-- row for graphs -->
  <div class="row mt-4">
<!-- colmn for line graph -->
    <div class="col-md-6">
      <div class="card card-outline dasht">
        <div class="card-body">
          <canvas id="piechart" height=""></canvas> 
          <h4 class="text-center">pie chart with most used category</h4>
        </div>        
      </div>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->

    <div class="col-md-6">
      <div class="card card-outline dasht">
        <div class="card-body">
          <canvas id="exp_liner" height=""></canvas> 
          <h4 class="text-center">line Garph showing expenses and there dates</h4>
          
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


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <!-- script for toast massage -->
  <!-- <script type="text/javascript">
    let toastBox = document.getElementById('toastBox');
    function showtoast()
    {
      let toast = document.createElement('div');
      toast.classList.add('toast');
      toast.innerHTML = 'success' ;
      toastBox.appendChild('toast');
    }
  </script> -->

  
  <script>
    feather.replace()
  </script>
    <script type="text/javascript">
      var ctx = document.getElementById('piechart').getContext('2d');
      var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [<?php
              while ($pi = mysqli_fetch_array($catnam)) 
              {
                echo '"' . $pi['CategoryName'] . '",';
               // echo "[ '".$pi['CategoryName']."',".$pi['amount']."],";
                # code...
              }
          ?>],
        datasets: [{
          label: 'Expense by Category',
          data: [
            
            <?php while ($pi2 = mysqli_fetch_array($catamount)) 
            {
                    echo '"' . $pi2['amount'] . '",';
                  } ?>],
          backgroundColor:
          [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          borderWidth: 1
        }]
      }
    });

      // llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll

          var line = document.getElementById('exp_liner').getContext('2d');
    var myChart = new Chart(line, {
      type: 'line',
      data: {
        labels: [<?php while ($c = mysqli_fetch_array($exp_date)) {
                    echo '"' . $c['E_date'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by date',
          data: [<?php while ($d = mysqli_fetch_array($exp_cash)) {
                    echo '"' . $d['E_amount'] . '",';
                  } ?>],
          borderColor: [
            '#adb5bd'
          ],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          fill: false,
          borderWidth: 2
        }]
      }
    });


    // llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll
    // the bar graph

          var line = document.getElementById('exp_bar').getContext('2d');
    var myChart = new Chart(line, {
      type: 'bar',
      data: {
        labels: [<?php while ($bar1 = mysqli_fetch_array($bar)) {
                    echo '"' . $bar1['dep_name'] . '",';
                  } ?>],
        datasets: [{
          label: 'budgets vs there depertments',
          data: [<?php while ($barb1 = mysqli_fetch_array($barb)) {
                    echo '"' . $barb1['amount'] . '",';
                  } ?>],
          borderColor: [
            '#adb5bd'
          ],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          fill: false,
          borderWidth: 2
        }]
      }
    });
    </script>



    <!-- script for the notififications ............................................  -->
<!-- <script>
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'noti/connection/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

   $('#notify').on('click',function(e){
        e.preventDefault();
        var name = $('#notifications_name').val();
        var ins_msg = $('#message').val();
        if($.trim(name).length > 0 && $.trim(ins_msg).length > 0){
          var form_data = $('#frm_data').serialize();
        $.ajax({
          url:'noti/connection/insert.php',
                type:'POST',
                data:form_data,
                success:function(data){
                    location.reload();
                }
        });
        }else{
          alert("Please Fill All the fields");
        }
      
       
   });
});
</script> -->


</body>
</html>
