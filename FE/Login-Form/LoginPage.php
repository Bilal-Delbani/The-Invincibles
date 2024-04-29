<!doctype html>
<?php 
	session_start();
?>
<html lang="en">
<head>
    <title>Login Page</title>
    <style>
		body {
			/* background-color: #f2f2f2; set background color */
			/* background: linear-gradient(109.6deg, #333 0%, #222 25%, rgb(255, 0, 0) 50%, #111 75%, #000 100%) !important; */
			/* background-repeat: no-repeat; /* prevent repeating of background image */
			/* background-size: cover;  */
			/* background: url("/videos/entry.mp4"); */
			position: relative;
		}


#video-background {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('a');

            for (var i = 0; i < links.length; i++) {
                links[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    var href = this.getAttribute('href');
                    document.querySelector('body').classList.add('animate__animated', 'animate__slideOutRight');
                    setTimeout(function() { 
                        window.location.href = href;
                    }, 1000);
                });
            }
        });
        
        function Login(){
            var mForm=document.querySelector("form[name='Login-form']");
            var username=mForm.elements["username"].value;
            var password=mForm.elements["password"].value;
            var options=mForm.elements["options"].value;
            if ((password!=confirmPassword)||(password==""))
                alert("Passwords must be equal.");
            else
                mForm.submit();
        }
    </script>
</head>
<body>
    
		<video id="video-background" autoplay muted >
			<source src="https://www.shutterstock.com/shutterstock/videos/1036747337/preview/stock-footage-lighting-the-empty-grass-playground-before-the-game-in-the-stadium-full-of-fans-sport-k.webm" type="video/mp4">
			Your browser does not support the video tag.
		</video>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">
                        <!-- <img src="../../images/favicon.png" alt="Logo" style="width: 80px;"> -->
                        <br><span class="logo" style="color:white">The Invincibles</span>  <br>
                        <h2 class="heading-section"> Greetings! Let's pick up <b>where we left off</b>. Please enter <b>Your Login details</b>.</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="../../BE/LogInPage.php" class="Login-form" method="POST" name="signup-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" 
                                       tyle="color: black; " required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" 
                                       tyle="color: black; " required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="password" 
                                       placeholder="Password"style="color: black;" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary submit px-3" value="Login" onclick="Login()">
                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary" style="color:white">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="../../BE/login-system-main/recover_psw.php" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">Don't have an account yet? <a  href ="../../index.html" style="color:#4c9cb7"> Sign up now</a>.</p>	        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    
<script>
	document.addEventListener("DOMContentLoaded", function() {
    var videos = ["https://www.shutterstock.com/shutterstock/videos/1036747337/preview/stock-footage-lighting-the-empty-grass-playground-before-the-game-in-the-stadium-full-of-fans-sport-k.webm", "https://www.shutterstock.com/shutterstock/videos/1030050752/preview/stock-footage-soccer-goalkeeper-jumps-and-catches-ball-on-a-professional-soccer-stadium-stadium-and-crowd-is.webm", "https://www.shutterstock.com/shutterstock/videos/1100229019/preview/stock-footage-aesthetic-shot-of-athletic-soccer-football-player-doing-beautiful-overhead-kick-on-stadium-with.webm", "https://www.shutterstock.com/shutterstock/videos/1056301883/preview/stock-footage-crowd-of-spectators-cheering-at-sports-event-man-holding-a-glass-of-beer-germany-football-team.webm"];
    var currentVideoIndex = 0;
    var videoElement = document.getElementById("video-background");

    videoElement.addEventListener("ended", function() {
        // Increment the current video index and wrap around if needed
        currentVideoIndex = (currentVideoIndex + 1) % videos.length;
        
        // Change the video source
        videoElement.src = videos[currentVideoIndex];
        
        // Reload the video to ensure it starts playing from the beginning
        videoElement.load();
    });
	
});

</script>
</body>
</html>
