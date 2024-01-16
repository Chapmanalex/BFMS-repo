<?php

session_start(); 

 $error = "";
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	if (!$DB = new PDO("mysql:host = localhost; dbname=ems_db","root","")) 
	{
		die("could not connect to the database");
		# code...
	}
	
	// save data to the database
/*	echo "<prev";
	print_r($_POST);
	echo "</prev>";*/

	//function to create a random user ID
		 function create_userID()
			   {
				$lenght = rand(4,20);
				$number = "";
				for ($i=0; $i < $lenght; $i++) 
				{ 
					$new_rand = rand(0,9);

					$number = $number . $new_rand;
					# code...
				}
				return $number;

				}

	$arr['email'] = $_POST['email'];
	$arr['pass'] = hash('sha1', $_POST['pass']);


	$query = "select * from user where email = :email && password = :pass limit 1" ;
	$stm = $DB -> prepare($query);
	if ($stm) 
		{

		$check = $stm -> execute($arr);
		if ($check) {
			$data = $stm -> fetchALL(PDO::FETCH_ASSOC);
			if (is_array($data) && count($data) > 0)
			 {

				$_SESSION['myses'] = $data[0]['userID'];
				$_SESSION['myemail'] = $data[0]['email'];
				$_SESSION['myrank'] = $data[0]['rank'];
			
				# code...
			}
			else
			{
				$error = " wrong username or password ";
			}
			# code..
		}
		
		if ($error == "") 
		{
			//redirecting user after adduser data successfull submision 

			echo ("<script type='text/javascript'>alert ('log in successfull');</script>");

         	echo ("<script type='text/javascript'>window.location='./index.php';</script>");
			// header("location: ../users.php");
			die();
			# code...
		}
		}

	# code...
}

?>