
<?php

include("session.php");
include "maintanance/access.php";
?>
<!DOCTYPE html>
<html>
<head>
	  	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<meta name="description" content="">
  		<meta name="author" content="">
	<title>user_profile</title>
  <link rel="icon" href="img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">
				
				<!-- Bootstrap core CSS -->
			  <link href="css/bootstrap.min.css" rel="stylesheet">

			  <!-- Custom styles for this template -->
			  <link href="css/css/style.css" rel="stylesheet">

			  <!-- Feather JS for Icons -->
			  <script src="js/feather.min.js"></script>
</head>


<body>
  <button class="btn btn-info mt-4 ml-4" 
          onclick="history.back()" >
          <span data-feather='arrow-left'></span>
          <strong>BACK</strong>
  </button>

  <div class="col-8 offset-md-3 mt-4">
    
  </div>
<div class="col-8 offset-md-3 mt-4">
      <div class="card mb-3 border-primary" style="max-width: 800px;">
        <div class="card-header">
          <h3 class="mt-4 ">My-profile</h3>
        </div>
             <div class="row">
                <div class="col-md-4">
                 <img  src="<?php   echo $userprofile ?>" class=" img img-fluid rounded-circle" alt="profileimage">
                 <a href="edit_image.php"  class="btn btn-flat ml-5" style="text-decoration: none; ">edit image</a>
                 
                </div>
              <div class="col-md-8">
                <div class="card-body">
                  <table>
                    <tr>

                      <td><h5 class="card-title"><?php   echo $username ?></h5></td>                      
                    </tr>
                    <tr>
                      <td><p class="card-text">Email: &nbsp; </p></td>
                      <td><p><?php   echo $useremail ?></p></td>
                    </tr>
                    <tr>
                      <td><p class="card-text">Gender: &nbsp;</p></td>
                      <td><p> <?php   echo $gender ?></p></td>
                    </tr>
                    <tr>
                      <td><p class="card-text">contact No: &nbsp;</p></td>
                      <td><p> <?php   echo $contact ?></p></td>
                    </tr>
                    <tr>
                      <td><p class="card-text">Rank: &nbsp;</p></td>
                      <td><p> <?php   echo $rank ?></p></td>
                    </tr>
                    <tr>
                      <td><p class="card-text">Address: &nbsp;</p></td>
                      <td><p> <?php   echo $address ?></p></td>
                    </tr>
                    <tr>
                    <!-- <td><p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p></td> -->
                  </tr>
                  </table>
                 
                </div>
              </div>
             </div>
      </div>
    </div>




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

  
  <script>
    feather.replace()
  </script>

</body>
</html>
