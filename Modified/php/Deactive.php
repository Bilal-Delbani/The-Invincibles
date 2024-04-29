<?php
session_start();

 $email = $_SESSION['email'];



// establish a database connection
$conn = mysqli_connect('localhost', 'root', '', 'football_club');


if(!empty($email)){
    // create the SQL query with the WHERE clause
$sql = "DELETE FROM fans WHERE EMAIL='$email'";

// execute the query
if (mysqli_query($conn, $sql)) {
  // if the insertion is successful, redirect to Players.php 
  echo "done";
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
