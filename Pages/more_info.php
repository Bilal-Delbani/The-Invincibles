<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["email"])){
    header("location:../index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" type="../image/x-icon" href="../images/favicon-32x32.png">

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
    </style>
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../images/run.jpg" style="object-fit: cover;" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="../images/logo1.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Continue filling your details</p>
                            <form id="login-form" method="post" action="../php/more.php">

                                <div class="form-group">
                                    <label for="pnum" class="sr-only" style="float: left;">Phone Number</label>
                                    <input type="number" name="pnum" id="pnum" class="form-control"
                                        placeholder="Phone Number*">

                                </div>
                                <div class="form-group">
                                    <label style="float: left;" for="address" class="sr-only">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Address*">
                                </div>
                                <div class="form-group">
                                    <label for="bdate" class="sr-only" style="float: left;">Birth Date</label>
                                    <input type="date" name="bdate" id="bdate" class="form-control"
                                        placeholder="Birth Date*">
                                </div>
                                <div class="form-group">
                                    <p>Gender:</p>
                                      <input type="radio" id="male" name="gender" value="male"> <span>Male</span>
                                      <input type="radio" id="female" name="gender" value="female"> <span>Female</span>
                                </div>
                                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4"
                                    type="button" value="Submit and Continue">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../js/alert_script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#login').click(function (e) {
                e.preventDefault();
                var formData = $('#login-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: '../php/more.php',
                    data: formData,
                    success: function (response) {
                        if (response == "done") {
                            window.location.href = "home.php";
                        }
                        else if (response == "wrong") {
                            myAlert('Something went wrong. Please try again', 'more_info.php', 'Try again');
                        }
                        else {
                            console.log(response);
                            myAlert('Please fill all fields', 'more_info.php', 'OK');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>