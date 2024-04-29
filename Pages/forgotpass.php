<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forgot Pass</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="icon" type="../image/x-icon" href="../images/favicon-32x32.png">

</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../images/shooting.webp" style="object-fit: cover;" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="../images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Forgot Password</p>
              <form id="login-form" action="../php/sendForgotLink.php">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address*">
                </div>
                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button"
                  value="Send Reset Link">
              </form>
              <br><br>
              <div class="custom-control custom-checkbox login-card-check-box">
              </div> <br>
              <p class="login-card-footer-text">Remembered Password? <a href="../index.php" class="text-reset">
                  Login here</a></p>
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
            url: '../php/sendForgotLink.php',
            data: formData,
            success: function (response) {
                console.log(response);
              if (response == "sent") {
                myAlert('Password reset link was sent to your email', '../index.php', 'Return');
              }
              else if (response == "no-email") {
                myAlert('Your email is not registered with us', 'signup.html', 'Sign up');

              }
              else{
                myAlert('Please fill your email','forgotpass.php','OK');
              }
            }
          });
        });
      });
  </script>
  </script>
</body>

</html>