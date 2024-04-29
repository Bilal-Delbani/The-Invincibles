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
</head>
<body>
    <!--title for the page-->
    <header class="default-header">
        <h1>About Football Merchandise</h1>
    </header>
    <!--menu bar that has paths to different pages in the website-->
    <nav class="default-nav" id="merch_nav">
        <ul>
            <li><a href="Merchandise.php">Home</a></li>
            <li><a href="Tickets.php">Tickets</a></li>
            <li><a href="#Contact">Contact</a></li>
        </ul>
    </nav>
    <!--Information about the merchandise page and our system-->
    <main>
        <section>
            <h2>Our Story</h2>
            <p>
                Football Merchandise is dedicated to providing high-quality football items and accessories to passionate football fans around the world. With a wide range of products including T-Shirts, scarves, balls, skeleton mannequins, and more, we aim to be your one-stop shop for all your football merchandise needs.
            </p>
            <p>
                Our journey began in 2024 when a group of football enthusiasts came together with a shared vision of creating a platform that celebrates the spirit of football and connects fans with their favorite teams and players. Since then, we have been committed to delivering exceptional products that showcase your love for the beautiful game.
            </p>
        </section>
        <section>
            <h2>Our Mission</h2>
            <p>
                At Football Merchandise, our mission is to provide football fans with access to authentic and officially licensed merchandise from top football clubs and national teams. We work directly with trusted suppliers and manufacturers to ensure the highest quality standards for all our products.
            </p>
            <p>
                We strive to create an enjoyable shopping experience for our customers, offering a user-friendly website, secure payment options, and reliable shipping services. Our team is passionate about football and customer satisfaction, and we are always here to assist you with any inquiries or support you may need.
            </p>
        </section>
        <!--Contact part-->
        <section>
            <h2 id="Contact">Contact Us</h2>
            <p>
                We value your feedback and would love to hear from you. If you have any questions, suggestions, or concerns, please don't hesitate to reach out to us.
            </p>
            <p>
                <i class="fas fa-envelope-open"></i> <a href="mailto:admin@footballmerchandise.com">info@footballmerchandise.com</a><br>
                <i class="fas fa-phone-alt"></i>+961 76 029 305<br>
                <i class="fas fa-map-marker-alt beat-animation"></i>123 Football Street, City, Country<br>
            </p>
        </section>
    </main>
    <!--copy rights-->
    <footer>
        &copy; 2024 Football Merchandise. All rights reserved.
    </footer>
    <!--script that keeps tracking for any scrolling in the page to change the style of the header and menu bar(nav)-->
    <script>
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


    </script>
</body>
</html>
