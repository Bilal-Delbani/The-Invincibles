<?php

/* This function will add the user to the DB by the AddFan function 
and it is explained in the functions.php file */

require_once('functions.php');

$M_ID = $_POST['M_id'];
$carpool_id = $_POST['carpool_id'];
$id = $_POST['Fan_id'];
$row = $_POST['row'];
AddFan($carpool_id, $_POST['phoneNumber'], $id /* FAN_ID */);
header("location: ../Pages/More.php?id=".$M_ID);
?>