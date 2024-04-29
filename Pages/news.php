<?php require_once("../php/common_sections.php");?>
<?php require_once("../php/results_retrieval_functions.php");?>
<?php require_once("../php/news_retrieval_functions.php");?>
<?php

    session_start();
    if(strpos($_SESSION["email"],'.admin')){
      header("location:../index.html");
    }
    if(!isset($_SESSION["username"])){
        header("location:../index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>News Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/my_styles.css" />
    <link rel="stylesheet" href="../css/matchesStyle.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="icon" href="../images/favicon.png">

    
  </head>
  <body>
  <div class="site-wrap">
<?php Head()?>
<?php
  $Title="Welcome To Our NEWS Page";
  $description="This page is dedicated inorder to keep you involved and up to date with the latest events that are related to our club";
  $imageLink="../images/messiSmiling.jpg";
 commonPartTeamMatches($Title,$description,$imageLink)
 ?>
    <div class="site-section">
      <div class="container" style="margin-top:-60px;">
        <div class="row mb-5">
          <?php displayNews()?> 

        </div>

      </div>
    </div>
  <div>
    <?php footer()?>
  </div>

    
  </body>
  
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>
</html>