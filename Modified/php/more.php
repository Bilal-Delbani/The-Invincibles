<?php
session_start();
// get the submitted form data
$pnum = $_POST['pnum'];
$address = $_POST['address'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$email = $_SESSION['email']; ;
// establish a database connection
$conn = mysqli_connect('localhost', 'root', '', 'football_club');

// check for empty fields
if($pnum=="" || $address=="" ||$bdate=="" || $gender==""){
  echo "nothing";
  exit();
}
if(!empty($email)){
    // create the SQL query with the WHERE clause
$sql = "UPDATE fans SET pnum='$pnum', address='$address', bdate='$bdate', gender='$gender' WHERE email='$email'";

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
