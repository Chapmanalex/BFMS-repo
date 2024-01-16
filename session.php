<?php
include("maintanance/dbconnection.php");
session_start();
if(!isset($_SESSION["myemail"])){
header("Location: login.php");
exit();
}

$sess_email = $_SESSION["myemail"];
$sql = "SELECT * FROM user WHERE email = '$sess_email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $userid=$row["userID"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $lastname = $row["othernames"];
    $username =$row["firstname"]." ".$row["lastname"]." ".$row["othernames"];
    $useremail=$row["email"];
    $userprofile = $row["profile_path"];
    $gender= $row["gender"];
    $contact =$row["contactNo"];
    $rank = $row["rank"];
    $address =$row["address"];
    $dep = $row["depID"];
  }
} 
else 
{

  echo "<script type='text/javascript'>alert('user session not found!')</script>";
  header('login.php');
  
  die();
}
?>