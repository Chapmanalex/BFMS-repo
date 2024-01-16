
<?php 
// include "dbconnection.php";
include "maintanance/login_actio.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="icon" href="img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg" type="image/icon_type">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/css/customcss.css">
</head>
<body>
	<div class="blurred-background">
		<div class="container d-flex justify-content-center align-items-center blurred-background" 
				style="min-height: 100vh;"  >
		<form class="loginform border shadow p-3 rounded" 
				style="width: 450px" 
				action=""
				method="post">
			<h1 class="text-center p-3 ">LOGIN</h1>

		<?php if ($error != "") {?>

			<div class="alert alert-danger" role="alert">
 			 <?php echo $error ; ?>
			</div>
			<?php } ?>
			
		  <div class="mb-3">
		    <label for="email" 
		    		class="form-label">Enter email</label>
		    <input type="email" 
		    		name="email" 
		    		class="form-control" 
		    		id="email"
		    		required >
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		    		class="form-label">Password</label>
		    <input type="password" 
		    		name="pass" 
		    		class="form-control" 
		    		id="pass"
		    		required >
		  </div>
		      
		  <button type="submit" class="btn btn-primary mb-3">LogIn</button>
		</form>
</div>
</div>
</body>
</html>