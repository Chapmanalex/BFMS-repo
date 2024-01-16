<?php 
include "maintanance/login_actio.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>xpenser logIn</title>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/css/customcss.css">
	<!-- <link rel="stylesheet" href="customcss.css"> -->
</head>
<body>
	<div class="login-container">
		<div class="login-form">
            <h2>LogIn</h2>
            <form action="#" method="POST">
            	<?php if ($error != "") {?>

			<div class="alert alert-danger" role="alert">
 			 <?php echo $error ; ?>
			</div>
			<?php } ?>
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password">
                </div>
                <div>
                <button type="submit" class="btn btn-primary mb-3">LogIn</button>

                 <div class="fgp">
                	<p>forgot password? click <a href="#">here</a></p>
                </div>
                </div>

                
            </form>
        </div>

	</div>
</body>
</html>