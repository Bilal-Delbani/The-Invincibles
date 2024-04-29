<?php 
$dbhost="127.0.0.1";
$dbname="mpm_db";
$dbuser="root";
$dbpass="mpmdb";
$db=null;

// $connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
try {
  $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);		
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

/*
// Check connection
if ($mysqli -> connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}*/
?>