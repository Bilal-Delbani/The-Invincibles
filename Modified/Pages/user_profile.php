<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(strpos($_SESSION["email"],'.admin')){
    header("location:../index.html");
  }
if(!isset($_SESSION["username"])){
header("location:../index.html");
}

$conn = mysqli_connect('localhost', 'root', '', 'football_club');

$email = $_SESSION['email'];
$sql = "SELECT * FROM fans WHERE EMAIL='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$address = $row["CURRENT_ADDRESS"];
$password = $row["PASSWORD"];
$username = $row["USERNAME"];
$fname = $row["FIRST_NAME"];
$pnum = $row["PHONE"];
$bio = $row["BIO"];
$lname = $row["LAST_NAME"];
$points = $row["POINTS"];
?>
<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="icon" type="../image/x-icon" href="images/favicon-32x32.png">
    <link rel="icon" href="../images/png/profile-user.png">

    <style>
        input {
            overflow: hidden;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <form id="login-form" method="post">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <h3 style="padding-bottom:10px;" class="mb-2 text-primary">Your Profile</h3>
                                    <div class="user-avatar">
                                        <img style="object-fit:cover;width:150px;height:150px;border:5px black solid;"
                                            src="../images/userpic.webp" alt="Profile Pic">
                                    </div>

                                    <h5 class="user-name">
                                        <?php echo $fname . ' ' . $lname; ?>

                                    </h5>
                                    <h6 class="user-email">
                                        <?php echo $email ?>
                                    </h6>
                                </div>
                                <form id="login-form" method="post">
                                    <div class="about">
                                        <h5>About</h5>
                                        <textarea style="height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;" name="bio" type="text" class="form-control bio" id="bio" placeholder="Bio"><?php echo htmlspecialchars($bio ?? '', ENT_QUOTES); ?></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div style="margin-bottom:10px;" class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h5 style="padding-bottom:10px;" class="mb-2 text-primary">You currently have:</h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <img style="width:60px;" src="../images/token.png" alt="points img">
                                        <h5 class="mb-2 text-primary" style="display:inline;color:gold!important;">
                                            <?php
                                            echo $points . " points";
                                            ?>
                                        </h5>
                                        <div><button style="margin-top:15px;" type="button" id="submit" name="submit"
                                                onclick="window.location.href='Merchandise.php'"
                                                class="btn btn-primary">Shop Now</button></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h4 class="mb-2 text-primary">Your Details</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input name="fname" type="text" class="form-control" id="fname"
                                                placeholder="First Name" value=<?php echo $fname ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input name="lname" type="text" class="form-control" id="lname"
                                                placeholder="Last Name" value=<?php echo $lname ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" class="form-control" name="pnum" id="pnum"
                                                placeholder="Enter phone number" value=<?php echo $pnum ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input name="address" type="text" class="form-control" id="address"
                                                placeholder="Address" value=<?php echo $address ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password"
                                                placeholder="Password" value=<?php echo $password ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button style="margin-left:12px; margin-right:17px;" type="submit" id="login" name="login"
                                            class="btn btn-primary">Update</button>
                                        <button style="margin-left:12px; margin-right:15px;"
                                            onclick="window.location.href='home.php'" type="button" id="submit"
                                            name="submit" class="btn btn-secondary">Cancel</button><br>
                                        <button style="background-color:red;margin-top:12px;"
                                            onclick="window.location.href='../php/signout.php'" type="button" id="submit"
                                            name="submit" class="btn btn-secondary">Sign
                                            Out</button>

                                        <button style="margin-left:12px; margin-top:12px; background-color:red;" type="submit" id="deactivate" name="Deactivate"
                                            class="btn btn-primary">Deactivate</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../js/alert_script.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#login').click(function (e) {
                e.preventDefault();
                var formData = $('#login-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: '../php/changeinfo.php',
                    data: formData,
                    success: function (response) {
                        if (response == "done") {
                            myAlert('Info has been updated', 'user_profile.php', 'OK');
                        }
                        else if (response == "wrong") {
                            myAlert('Something went wrong. Please try again', 'user_profile.php', 'Try again');
                        }
                        else {
                            myAlert('Please fill all fields', 'user_profile.php', 'OK');
                        }
                    }
                });
            });
        });
        $('#deactivate').click(function (e) {
                e.preventDefault();
                var formData = $('#login-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: '../php/Deactive.php',
                    data: formData,
                    success: function (response) {
                        if (response == "done") {
                            myAlert("You're Deactivated from this website!!! Thank you for being a fan in our team...", '../index.html', 'OK');
                        }
                        else if (response == "wrong") {
                            myAlert('Something went wrong. Please try again', 'user_profile.php', 'Try again');
                        }

                    }
                });
            });
        
    </script>

</body>

</html>
