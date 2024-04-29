<?php session_start() ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="../../images/favicon.png">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>User Password Recovery</title>
    <style>
        body {
            /*background-image: url('images/back.png'); set background image */
			background: linear-gradient(109.6deg, #333 0%, #222 25%, rgb(255, 0, 0) 50%, #111 75%, #000 100%) !important;
            background-repeat: no-repeat;
            /* prevent repeating of background image */
            background-size: cover;
        }

        input[type="submit"][name="recover"] {
            background-color: green;
            /* Green background */
            color: white;
            /* White text */
            font-size: 16px;
            /* Font size */
            padding: 12px 24px;
            /* Padding */
            border: none;
            /* Remove borders */
            border-radius: 4px;
            /* Rounded corners */
            cursor: pointer;
            /* Add cursor on hover */
        }
        /* On hover */
        input[type="submit"][name="recover"]:hover {
            background-color: #00AA00;
            /* Dark green background */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <span class="navbar-brand" style="color:white">User Password Recover</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Password Recover</div>
                        <div class="card-body">
                            <form  method="POST" name="recover_psw">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Recover" name="recover">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>

</html>

<?php
if (isset($_POST["recover"])) {
    $dbhost = "127.0.0.1";
    $dbname = "football_club";
    $dbuser = "root";
    $dbpass = "";
    $db = null;
    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    $email = $_POST["email"];
    $query = "SELECT * FROM fans WHERE EMAIL=:email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->rowCount();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($count != 1) {
?>
            <script>
                alert("<?php echo "Sorry, no emails exists " ?>");
            </script>
        <?php
    }
    else{

    
        
 
         
            $token = bin2hex(random_bytes(50));
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'yaakoubdevelopper2003@gmail.com';
            $mail->Password = 'spjwrhyieqhtdygq';
            $mail->setFrom('yaakoubdevelopper2003@gmail.com', 'Password Reset');
            $mail->addAddress($_POST["email"]);
            $mail->isHTML(true);
            $mail->Subject = "Recover your password";
            $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/Modified/FE/Login-Form/index_change_password.html <br><br>
            <p>With regrads,</p>
            <b>Invincibles IT Department</b>";
            if (!$mail->send()) {
            ?>
                <script>
                    alert("<?php echo " Invalid Email " ?>");
                </script>
            <?php
            } else {
            ?>
                <script>
                    window.location.replace("notification.html");
                </script>
        <?php
            }
        
    }

    
}


?>