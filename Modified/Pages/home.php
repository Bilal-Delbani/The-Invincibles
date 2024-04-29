<?php require_once("../php/common_sections.php");?>
<?php require_once("../php/results_retrieval_functions.php");?>
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
    <title>The Invincibles</title>
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
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/my_styles.css" />
    <link rel="stylesheet" href="../css/matchesStyle.css" />
    <link rel="icon" href="../images/favicon.png">

  </head>
  <body>
  
  <div class="site-wrap">
    <?php Head()?>
    <div class="slide-one-item home-slider owl-carousel">
      <div class="site-blocks-cover overlay" style="background-image: url(../images/messi.webp);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-start">
            <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
              <h1 >Welcome our Lovely fans</h1>
              <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" style="background-color: hsla(51, 100%, 50%, 0.925);">Read More</a></p>
            </div>
          </div>
        </div>
      </div>  
      <div class="site-blocks-cover overlay" style="background-image: url(../images/messiBasht.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-start">
            <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
              <h1 >Welcome our Lovely fans</h1>
              <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" style="background-color: hsla(51, 100%, 50%, 0.925)">Read More</a></p>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(../images/messiSmiling.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-start">
            <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
              <h1>Welcome our Lovely fans</h1>
              <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" style="background-color: hsla(51, 100%, 50%, 0.925)">Read More</a></p>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <div class="site-blocks-vs site-section bg-light">
      <div class="container">
      <?php displayComingMatch()?>
      <?php displayLatestMatch()?>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-black">Latest News</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="../images/img_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="../images/img_2.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="post-entry">
              <div class="image">
                <img src="../images/img_3.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="text p-4">
                <h2 class="h5 text-black"><a href="#">RealMad vs Striker Who Will Win?</a></h2>
                <span class="text-uppercase date d-block mb-3"><small>By Colorlib &bullet; Sep 25, 2018</small></span>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat beatae doloremque, ex corrupti perspiciatis.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <?php footer();?>

    

  </div>
  <script src="https://www.socialintents.com/api/chat/socialintents.1.3.js#2c9fab35880d4d1101880e93c3400076" async="async"></script>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>