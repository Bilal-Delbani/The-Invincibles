<?php
session_start();
// get the submitted form data
$pnum = $_POST['pnum'];
$address = $_POST['address'];
 $email = $_SESSION['email'];
// $email="fan@gmail.com";
$password = $_POST['password'];
$bio = $_POST['bio'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$bdate = $_POST['bdate'];

// establish a database connection
$conn = mysqli_connect('localhost', 'root', '', 'football_club');


if(!empty($email)){
    // create the SQL query with the WHERE clause
$sql = "UPDATE fans SET PHONE='$pnum', CURRENT_ADDRESS='$address', LAST_NAME='$lname', FIRST_NAME	='$fname' ,BIRTHDAY_DATE = '$bdate',  BIO='$bio', PASSWORD='$password' WHERE EMAIL='$email'";

// execute the query
if (mysqli_query($conn, $sql)) {
  // if the insertion is successful, redirect to Players.php 
  echo 'done';
  exit();
} else {
  // if the insertion fails, show an error message and redirect to signup page
  echo "wrong";
  exit();
}
    
}
else{
    echo 'wrong';
}

?>
