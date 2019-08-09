<?php
 
include 'connection.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId = 0;
 
 $ImageData = $_POST['ImageData'];
 
 $ImageName = $_POST['ImageName'];
 
 $ImagePath = "upload/$ImageName.jpg";
 
 $ServerURL = "http://192.168.1.102/www.android.com/imgupload/$ImagePath";
 
 $InsertSQL = "INSERT INTO tbl_img_upload (path,name) values('$ServerURL','$ImageName')";
 
 if(mysqli_query($conn, $InsertSQL)){
 
 file_put_contents($ImagePath,base64_decode($ImageData));
 
 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 }
 
?>