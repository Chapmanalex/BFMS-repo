<?php 
// my system access session
if($_SESSION['myses'] == "" && $_SESSION['myemail']== "")
{
    echo ("<script type='text/javascript'>alert ('Please Login first');</script>");
    echo ("<script type='text/javascript'>window.location='login.php';</script>");
}
// simple method

/*$admin = isset($_SESSION['myrank']) && $_SESSION['myrank'] == "admin";
$user = isset($_SESSION['myrank']) && $_SESSION['myrank'] == "user";*/


// saving as sessions

$_SESSION["ACCESS"]["ADMIN"] = isset($_SESSION['myrank']) && trim($_SESSION['myrank']) == "admin";

$_SESSION["ACCESS"]["USER"] = isset($_SESSION['myrank']) && (trim($_SESSION['myrank']) == "user");

function access ($rank, $redirect = true )
{
	if (isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$rank]) 
	{

		if ($redirect) 
		{

			echo ("<script type='text/javascript'>alert ('access denied');</script>");
		  	$previousPageUrl = $_SERVER['HTTP_REFERER'];
			header('Location: ' . $previousPageUrl);
			

			// header("location: maintainance/access_error.php");
		
		die;
			# code...
		}
		return false ;
		
		# code...
	}

	return true;
}


 ?>