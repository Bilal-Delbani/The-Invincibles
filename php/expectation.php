<?php
require_once('../php/functions.php');

/*This function will retrieve the fan id, match id, and the expectation provided by the user and
will be added to the expectation table */

$conn = connectDB2();

$F_ID = $_POST['id'];
$M_ID = $_POST['match'];
$exp = $_POST['Exp'];

$query = "INSERT INTO `expextation`(`FAN_ID`, `MATCH_ID`, `EXPECTATION`) VALUES ($F_ID,$M_ID,'$exp')"; 
$result = mysqli_query($conn, $query);
header("location: ../Pages/More.php?id=".$M_ID);
?>