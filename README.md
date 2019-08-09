# UploadPhoto
Android Upload Image To Server Using PHP MySql


Creating Database and Table


Open phpmyadmin to open this type localhost/phpmyadmin in Internet Browser and Create a Database and Table.

Creating Database

CREATE DATABASE android;

Creating Table

CREATE TABLE IF NOT EXISTS `imageupload` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
);

Connection.php file
<?php   
//Define your host here.
$servername = "localhost";
//Define your database username here.
$username = "root";
//Define your database password here.
$password = "";
//Define your database name here.
$dbname = "android";

$conn = mysqli_connect($servername,$username,"",$dbname);
?>

Upload.php file

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

