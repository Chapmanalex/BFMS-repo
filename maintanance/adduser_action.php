<?php
$hostname = "localhost";
$username1 = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username1,$password,$dbname) OR die('failed to connect to the database');
//db con 
function create_userID()
			   {
				$lenght = rand(4,20);
				$number = "";
				for ($i=0; $i < $lenght; $i++) { 
					$new_rand = rand(0,9);

					$number = $number . $new_rand;
					# code...
				}
				return $number;

				}




if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$userID 	= create_userID();
	// checking if user Id exists
// $condition = true;
// while ($condition) 
// { 
// 	$query = "select ID from user where userID = :userID limit 1" ;
// 	$stm = $DB -> prepare($query);
// 	if ($stm) {

// 		$check = $stm -> execute($arr);
// 		if ($check) {
// 			$data = $stm -> fetchALL(PDO::FETCH_ASSOC);
// 			if (is_array($data) && count($data) > 0)
// 			 {

// 				$arr['userID'] = create_function();
// 				continue;			
// 				# code...
// 			}
// 			# code..
// 		}
		
// 		# code...
// 	}
// 	$condition = false;
// # code...
// }
	$surname	= stripslashes($_POST['surname']);
	$lastname	= stripslashes($_POST['lastname']);
	$othernames = stripslashes($_POST['othernames']);
	$gender		= stripslashes($_POST['gender']);
	$Contact 	= stripslashes($_POST['Contact']);
	$address	= stripslashes($_POST['address']);
	$email		= stripslashes($_POST['email']);
	$pass 		= hash('sha1', $_POST['pass']);
	$rank		= stripslashes($_POST['rank']);
	$dep		= stripslashes($_POST['dep']);

	
	// check if department is occupied
	$chk = mysqli_query($con ," SELECT depID FROM user WHERE depID = '$dep' ");
	$resi = mysqli_fetch_array($chk);
	if($resi)
	{
		echo ("

	 				<script type='text/javascript'>
	 				alert ('the Depertment you selected is occupied');
	 				window.location='../users.php';
	 				</script>");
		die();

	}
	$checkemail = mysqli_query($con ,"SELECT email FROM user WHERE email= '$email'");
	$ck = mysqli_fetch_array($checkemail);
	if ($ck) 
	{
		echo "<script type='text/javascript'>
	 				alert (' bnthe email you entered is already taken .......!');
	 				window.location='../users.php';
	 				</script>";
	 				die();
	}


	$query = mysqli_query($con , "INSERT into user (userID, firstname, lastname , othernames, gender , contactNo , address, email , password, rank, depID ) values ('$userID', '$surname' , '$lastname' ,'$othernames' ,'$gender' ,'$Contact' , '$address' , '$email' , '$pass' , '$rank', '$dep') " );

	if ($query)
	{
			echo ("<script type='text/javascript'>alert ('User added sussesfully');</script>");

         	echo ("<script type='text/javascript'>window.location='../users.php';</script>");
		# code...
	}
	else
	{
		echo "<script type='text/javascript'>alert ('there was an issue adding the user');</script>";
	}



	}
	# code...
// }
?>

<?php

//{
//error checking 
// my

// if($_SERVER['REQUEST_METHOD'] == "POST") 
// {
// 	if (!$DB = new PDO("mysql:host = localhost; dbname=ems_db","root","")) 
// 	{
// 		die("could not connect to the database");
// 		# code...
// 	}
	
	// save data to the database
/*	echo "<prev";
	print_r($_POST);
	echo "</prev>";*/

	//function to create a random user ID
		 
	
	
	


	
// 	$stm = $DB -> prepare($query);
// 	if ($stm) 
// 		{
// 		$check = $stm -> execute($arr);
// 		if (!$check)
// 		{
// 			$error = " user data was not saved to the database ";	
// 			# code...
// 		}
// 		if ($error == "") 
// 		{
// 			//redirecting user after adduser data successfull submision 

// 			echo ("<script type='text/javascript'>alert ('User added sussesfully');</script>");

//          	echo ("<script type='text/javascript'>window.location='../users.php';</script>");
// 			// header("location: ../users.php");
// 			die();
// 			# code...
// 		}
// 		}

// 	# code...
// }
// }

?>