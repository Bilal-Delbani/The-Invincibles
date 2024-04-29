<?php
require_once('../php/functions.php');

/* This function will add the the data of the user who provide the ride, 
the capacity, fan id, driver id, and match id will be added to the database of carpool*/

$conn = connectDB2();

$match = $_POST['match'];
$add = $_POST['Add'];
$id = $_POST['d_id'];
$Capacity = $_POST['Capacity'];

$query = "INSERT INTO `carpool`(`DRIVER_ID`, `PASSENGER_ID`, `MATCH_ID`, `LOCATION`, `CAPACITY`, `AVAILABLE`) VALUES ($id,0,$match,'$add',$Capacity,1)";
echo $query;
$result = mysqli_query($conn, $query);
header("location: ../Pages/More.php?id=".$match);
?>