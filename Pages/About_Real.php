<!-- About Real page is a page that gives whole information about our team and our victories 
to stimulates the fans to buy tickets and watch matchs-->
<?php 
session_start();
if(strpos($_SESSION["email"],'.admin')){
    header("location:../index.html");
  }
//if no login done before, the user can not access the page and this will take the user back to the login page directly 
if(!isset($_SESSION["username"])){
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
        
    nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.2s ease-in-out;
    padding: 20px;
    position: relative;
    }

    nav ul li a::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #fff;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease-in-out;
    }

    nav ul li a:hover::before {
    transform: scaleX(1);
    }


</style>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Our Team</title>
    <!--link for getting icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--About real madrid page styling common with merchandise page-->
    <link rel="stylesheet" href="../css/About.css">
    <!--About real madrid page styling-->
    <link rel="stylesheet" href="../css/About_real.css">
    <!--About real madrid favicon-->
    <link rel="shortcut icon" href="../images/fav/trophy.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/header.css" />

</head>
<body style="background-color:white;">
        <!--menu bar that has paths to different pages in the website-->
<!-- <nav class="default-nav">
        <ul>
            <li><a href="Tickets.php">Home</a></li>
            <li><a href="Merchandise.php">Products</a></li>
            <li><a href="#Contact">Contact</a></li>

        </ul>
</nav> -->



<header style="padding:0px;position:fixed;top:0px; width:100%; z-index:1;margin:0">
    <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
    <div class="container position-relative" style="margin:0px;">
        <ul class="menu-list js-clone-nav" style="background-color:black">
        <li><a href="home.php">Home</a></li>
        <li><a href="Merchandise.php">Merchandises</a></li> 
        <li><a href="Tickets.php">Tickets</a></li>
        <li style="float: right;"><a href="../Pages/user_profile.php"><img style="width:30px;" src="../images/settings.png" alt="icon"></a></li>
        </ul>

    </div>

    </nav>
</header>


<!--information about the victories done by our team-->
    <section class="container"  style="margin-top:100px;background-color:black;">

        <div class="victory">
            <h2 style="color:white;"class="victory-title">La Liga Title - 2020</h2>
            <p style="color:white;" class="victory-description">Real Madrid secured the La Liga title in the 2019-2020 season with a series of impressive performances. The team showcased its dominance throughout the campaign, leading the league table with a significant point margin. The victory marked Real Madrid's 34th La Liga title, cementing their status as one of the most successful clubs in Spanish football history.</p>
        </div>
    </section>
    <section class="container" style="background-color:black;">

        <div class="victory">
            <h2 style="color:white;" class="victory-title">UEFA Champions League - 2018</h2>
            <p style="color:white;" class="victory-description">Real Madrid achieved glory in the UEFA Champions League during the 2017-2018 season. The team showcased its remarkable skills, defeating top European clubs in a thrilling competition. Real Madrid's victory in the final secured them their 13th Champions League title, highlighting their status as one of the most successful clubs in European football history.</p>
        </div>
    </section>
    <section class="container" style="background-color:black;">
        <div class="victory">
            <h2 style="color:white;" class="victory-title">Copa del Rey - 2014</h2>
            <p style="color:white;" class="victory-description">Real Madrid clinched the Copa del Rey title in 2014 with a memorable campaign. The team displayed exceptional performance and determination, defeating formidable opponents on their path to victory. The final match showcased Real Madrid's skill and teamwork, resulting in a well-deserved triumph and adding another Copa del Rey trophy to the club's illustrious history.</p>
    </section>
    <section class="container" style="background-color:black;">
        <div class="victory">
            <h2 style="color:white;" class="victory-title">Supercopa de España - 2022</h2>
            <p style="color:white;" class="victory-description">Real Madrid emerged victorious in the Supercopa de España tournament in 2022. The team displayed exceptional skill and resilience throughout the competition, facing tough opponents and showcasing their trademark style of play. The final match was a thrilling encounter, with Real Madrid showcasing their dominance and claiming the trophy with a convincing victory. This triumph marked another successful chapter in the club's history and solidified their reputation as one of the top teams in Spain.</p>
        </div>

    </section>
    <!--Contact information-->
    <section class="container" style="background-color:black;">
            <h2 id="Contact" style="color:white">Contact Us</h2>
            <p style="color:white;" >
                We value your feedback and would love to hear from you. If you have any questions, suggestions, or concerns, please don't hesitate to reach out to us.
            </p>
            <p style="color:white;" >
                <i class="fas fa-envelope-open"></i> <a href="mailto:admin@footballmerchandise.com">info@footballmerchandise.com</a><br>
                <i class="fas fa-phone-alt"></i>+961 76 029 305<br>
                <i class="fas fa-map-marker-alt beat-animation"></i>123 Football Street, City, Country<br>
            </p>
    </section>
        <!--copy rights-->
    <!-- <footer>
        &copy; 2024 Football Tickets. All rights reserved.
    </footer> -->

    <footer style="bottom:0;width:100%;text-align:center;  background-color: black;color: #fff;padding: 50px;text-align: center; font-size:17px; margin-top:10px;">
        &copy; 2024 Football Tickets. All rights reserved.
    </footer>
    </body>
    </html>