<?php
include 'session.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["but_upload"])) 

{
  getimagesize($_FILES["fileToUpload"]["tmp_name"]);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo '
         <script type="text/javascript">
          alert("sory your image is too large !");
           window.location ="profile.php";
         </script>';
         die;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") 
{
   echo '
         <script type="text/javascript">
          alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed....!");
           window.location = "profile.php";
         </script>';
         die();
  //$uploadOk = 0;
}

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "";

    // Insert record
        $query = "UPDATE user SET profile_path = '$target_file' WHERE userID = '$userid'";
        mysqli_query($con, $query);
echo '
         <script type="text/javascript">
          alert("The file has been uploaded succesfuly.");
          window.location = "profile.php";
         </script>';

  } 
}
else {
    echo '
         <script type="text/javascript">
          alert("Sorry, there was an error uploading your file.!");
           window.location.href ="profile.php";
         </script>';
    //echo "";
  }

?>

<?php

// if (isset($_POST['but_upload'])) 
// {

//     $name = $_FILES['file']['name'];
//     $target_dir = "../uploads/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);

//     // Select file type
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//     // Valid file extensions
//     $extensions_arr = array("jpg", "jpeg", "png", "gif");

//     // Check extension
//     if (in_array($imageFileType, $extensions_arr)) {

//         // Insert record
//         $query = "UPDATE user SET profile_path = '$name' WHERE userID = '$userid'";
//         mysqli_query($con, $query);

//         // Upload file
//         move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);

//         header("Refresh: 0");
//     }
// }
?>