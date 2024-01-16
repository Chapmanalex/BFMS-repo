<?php

    include('DB.php');
    include ('../../session.php');
    if (isset($_POST['submit'])) 
    {
    $rec				=  $_POST["recipient"];
    $notifications_name =  $_POST["notifications_name"];
    $message            =  $_POST["message"];
    $sender				=	$userid;

   $query = mysqli_query($con ,"INSERT INTO inf(notifications_name,message,active,userID,userID_2)VALUES('".$notifications_name."','".$message."','1','".$rec."','".$sender."' )");
    // $query = "INSERT INTO `inf` (`notifications_name`, `message`, `active`, `userID`, `userID_2`) VALUES ('$notifications_name', '$message','1', '$rec', '$sender')";
    if ($query)
	{
			echo ("<script type='text/javascript'>alert ('message sent sussesfully');</script>");

         	echo ("<script type='text/javascript'>window.location='../index.php';</script>");
		# code...
	}
	else
	{
		echo "<script type='text/javascript'>alert ('there was an issue sending message');</script>";
	}
    	# code...
    }
    

    
?>