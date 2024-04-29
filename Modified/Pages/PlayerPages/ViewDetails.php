<?php require_once ('../../php/players_retrieval_functions.php'); ?>

<?php
$player_number = $_GET['token'];
$tableName = $_GET['my_table'];
$page=$_GET['page'];
displayPlayerInformation($player_number,$tableName,$page);
?>

