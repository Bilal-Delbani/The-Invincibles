<!-- About Merchandise page is a page that gives whole information about our system and what we have and all contact information-->
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
<html>


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

<head>
    <title>About Football Merchandise</title>
    <!--about merchandise page design-->
    <link rel="stylesheet" href="../css/About_Merchandise.css">
    <!--about merchandise page design common with about ticket page design -->
    <link rel="stylesheet" href="../css/About.css">
    <!--merchandise page logo-->
    <link rel="shortcut icon" href="../images/fav/Question-Mark.png" type="image/x-icon">
    <!--link for getting icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css" />

</head>
<body  style="background-color:white">
    <!--title for the page-->

    <!--menu bar that has paths to different pages in the website-->


    <header style="padding:0px;position:fixed;top:0px; width:100%; z-index:1;margin:0; height:0;">
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
    <!--Information about the merchandise page and our system-->
    <main style="padding:10px; margin-top:100px;">
        <section style="background-color:black;">
            <h2 style="color:white;">Our Story</h2>
            <p style="color:white;">
                Football Merchandise is dedicated to providing high-quality football items and accessories to passionate football fans around the world. With a wide range of products including T-Shirts, scarves, balls, skeleton mannequins, and more, we aim to be your one-stop shop for all your football merchandise needs.
            </p>
            <p style="color:white;">
                Our journey began in 2024 when a group of football enthusiasts came together with a shared vision of creating a platform that celebrates the spirit of football and connects fans with their favorite teams and players. Since then, we have been committed to delivering exceptional products that showcase your love for the beautiful game.
            </p>
        </section>
        <section style="background-color:black;">
            <h2 style="color:white;">Our Mission</h2>
            <p style="color:white;">
                At Football Merchandise, our mission is to provide football fans with access to authentic and officially licensed merchandise from top football clubs and national teams. We work directly with trusted suppliers and manufacturers to ensure the highest quality standards for all our products.
            </p>
            <p style="color:white;">
                We strive to create an enjoyable shopping experience for our customers, offering a user-friendly website, secure payment options, and reliable shipping services. Our team is passionate about football and customer satisfaction, and we are always here to assist you with any inquiries or support you may need.
            </p>
        </section>
        <!--Contact part-->
        <section style="background-color:black;">
            <h2 style="color:white;" id="Contact">Contact Us</h2>
            <p style="color:white;">
                We value your feedback and would love to hear from you. If you have any questions, suggestions, or concerns, please don't hesitate to reach out to us.
            </p>
            <p style="color:white;">
                <i class="fas fa-envelope-open"></i> <a href="mailto:admin@footballmerchandise.com">info@footballmerchandise.com</a><br>
                <i class="fas fa-phone-alt"></i>+961 76 029 305<br>
                <i class="fas fa-map-marker-alt beat-animation"></i>123 Football Street, City, Country<br>
            </p>
        </section>
    </main>
    <!--copy rights-->
    <footer style="bottom:0;width:100%;text-align:center;  background-color: black;color: #fff;padding: 50px;text-align: center; font-size:17px; margin-top:10px;">
        &copy; 2024 Football Tickets. All rights reserved.
    </footer>
    <!--script that keeps tracking for any scrolling in the page to change the style of the header and menu bar(nav)-->
    <!-- <script>
window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
    var nav = document.querySelector('nav');

    if (window.scrollY > 0) {
        header.classList.add('scrolled-header');
        nav.classList.add('scrolled-nav');
    } else {
        header.classList.remove('scrolled-header');
        nav.classList.remove('scrolled-nav');
    }
});


    </script> -->
</body>
</html>
