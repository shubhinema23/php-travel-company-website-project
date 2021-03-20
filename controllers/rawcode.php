<!-- <?php
//$servername = "localhost";
//$username = "root";
//$password = "";

//global $conn;

//try {
 // $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
  // set the PDO error mode to exception
 // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
//} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
//}
?>
 -->



<?php
//print_r ("db");

$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysqli_select_db($connection, 'crud'); // Selecting Database
// //Fetching Values from URL
// $name = $_POST['txt_name'];
// $location = $_POST['txt_location'];
// //Insert query
// if( mysqli_query($connection, "insert into tbl_data(`name`, `location`) values ('$name', '$location')")){
// 	echo "Form Submitted Succesfully";
// }else
// 	echo "unsuccessfull";


// mysqli_close($connection); // Connection Closed
?>












<!-- <?php

$db = new mysqli("localhost", "root", "", "crud");

if($db->connect_error) {
  exit('Could not connect');
}

?> -->