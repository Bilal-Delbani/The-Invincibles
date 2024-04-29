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
  <title>Our Matches</title>
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
  $Title="Here You Can View Our Upcoming Games";
  $description="We are currently fighting over all the possible titles.We are having a busy schedule of games beween the League, UEFA champions leage and the Copa del Rey";
  $imageLink="../images/messiBasht.jpg";
 commonPartTeamMatches($Title,$description,$imageLink)?>
    </div>   

    <div class="site-section site-blocks-vs">
      <div class="container">
        
        <div class="row align-items-center mb-5" 
        >
              <div class="col-md-12">
            <h2 class="h6 text-uppercase text-black font-weight-bold mb-3">Latest Matches</h2>
            <div class="site-block-tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">UCL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">La Liga</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">la Copa</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="row align-items-center">
                    <div class="col-md-12">
                
              <?php displayResults("Uefa Champions League");?>
 
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div class="row align-items-center">
                    <div class="col-md-12">

                    <?php displayResults("La Liga");?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                  <div class="row align-items-center">
                    <div class="col-md-12">
                    <?php displayResults("La COPA");?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-center mb-5" >
                <div class="col-md-12">

            <h2 class="h6 text-uppercase text-black font-weight-bold mb-3">Coming Matches</h2>
            <div class="site-block-tab">
              <ul class="nav nav-pills mb-3" id="pills-tabC" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tabC" data-toggle="pill" href="#pills-homeC" role="tab" aria-controls="pills-homeC" aria-selected="true">UCL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tabC" data-toggle="pill" href="#pills-profileC" role="tab" aria-controls="pills-profileC" aria-selected="false">La Liga</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tabC" data-toggle="pill" href="#pills-contactC" role="tab" aria-controls="pills-contactC" aria-selected="false">la Copa</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-homeC" role="tabpanel" aria-labelledby="pills-home-tabC">
                  <div class="row align-items-center">
                    <div class="col-md-12">
                
              <?php displayMatches("Uefa Champions League");?>
 
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-profileC" role="tabpanel" aria-labelledby="pills-profile-tabC">
                  <div class="row align-items-center">
                    <div class="col-md-12">

                    <?php displayMatches("La Liga");?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-contactC" role="tabpanel" aria-labelledby="pills-contact-tabC">
                  <div class="row align-items-center">
                    <div class="col-md-12">
                    <?php displayMatches("La COPA");?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php footer(); ?>
  </div>

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