<?php
require_once('../php/functions.php');

/*This function will retrieve the match id, the fan id, and the feedback provided by the user
and will be added to the deedback table to be accessed from the admin */

$conn = connectDB2();

$M_ID = $_POST['M_id'];
$FAN_ID = $_POST['id'];
$fb = $_POST['FB'];

$query = "INSERT INTO `feedback`(`FAN_ID`, `FEEDB`) VALUES ($FAN_ID,'$fb')";
$result = mysqli_query($conn, $query);
header("location: ../Pages/More.php?id=".$M_ID);
?>