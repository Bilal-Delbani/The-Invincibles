<?php require_once("../php/common_sections.php");?>
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
  <title>Check Our Team</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/my_styles.css" /> 
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">      
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="icon" href="../images/favicon.png">

    <style>
.my-container {
  width: 200px;
  height: 200px;
  transition: all 0.3s ease-in-out
}
.my-container:hover {
  transform: scale(1.2); /* increase scale to 1.2 on hover */
  cursor: pointer;
}
      </style>
    
  </head>
  <body>
  <div class="site-wrap">   
     <?php Head()?>
     <?php
  $Title="Here You Can View Our Fabulous Team";
  $description="Our squad is made of 24 word class players from all over the world.We all unite under one goal, which is winning for our club";
  $imageLink="../images/messiBasht.jpg";
 commonPartTeamMatches($Title,$description,$imageLink)?>
    </div>
    <main>
      <div >
      <section class="dashboard-section ">
        <div class="containerBlock">
          <div class="dashboard-container">
            <div class="dashboard-item">
              <h3>Goal Keepers</h3>
              <p>View the list of available goalkeepers on your team.</p>
              <button class="secondary-button"><a href="PlayerPages/GoalKeeper.php">View Keepers</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Defenders</h3>
              <p>View the list of available defenders on your team.</p>
              <button class="secondary-button"><a href="PlayerPages/Defender.php">View Defenders</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Midfielders</h3>
              <p>View the list of available midfielders on your team.</p>
              <button class="secondary-button"><a href="PlayerPages/Midfielder.php">View Midfields</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Attackers</h3>
              <p>View the list of available Attackers on your team.</p>
              <button class="secondary-button"><a href=" PlayerPages/Forward.php">View Attackers</a></button>
            </div>
          </div>
        </div>
      </section>
      </div>
    </main>


    <?php footer(); ?>
  </div>

  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>