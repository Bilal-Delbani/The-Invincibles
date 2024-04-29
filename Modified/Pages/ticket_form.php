<!-- this form is for confirmation of the purchase done by the fan for the tickets-->
<?php 

session_start();

if(strpos($_SESSION["email"],'.admin')){
    header("location:../index.html");
  }
//if no login done before by the fan no access is made and the user is directed to the login page
if(!isset($_SESSION["username"])){
header("location:../index.html");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Form for Tickets</title>
    <link rel='icon' type='image/x-icon' href='../images/fav/purchase-logo.jpg'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/purchase_form.css">
</head>
<body>
    <div class="container">
        <h2>Payment Form for Tickets</h2>
        <form id="paymentForm" action="../php/updatetickets.php" method="post">

            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="middlename">Middle Name:</label>
            <input type="text" id="middlename" name="middlename" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>



            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="cardNumber">Credit Card Number:</label>
            <input type="password" id="cardNumber" name="cardNumber" required>

            <label for="confirmCardNumber">Confirm Credit Card Number:</label>
            <input type="password" id="confirmCardNumber"  name="confirmCardNumber" required>

            <label for="payment">Payment:</label>
            <input type="number" id="payment"  name="payment" min=0 value=0 required>

            <div>
                <label style="display:inline-block;margin-bottom:10px;margin-top:10px;">Gender:</label>
                <input   type="radio" id="male"  name="gender" value='Male' required>
                <label for="male" style="display:inline-block">Male:</label>
                <input type="radio" id="female"  name="gender" value='Female' required>
                <label for="female" style="display:inline-block">Female:</label>
            </div>


            <input type="submit" value="Submit">

            <!--these hidden inputs are used to save the total amount paid by the fan as well as individual payments for each match-->
            <input type="hidden" id="total" name="total" value=<?php echo $_POST["total"]; ?>>

            <input type="hidden" id="hidden1" name="hidden1" value=<?php echo $_POST["hidden1"]; ?>>
            <input type="hidden" id="hidden2" name="hidden2" value=<?php echo $_POST["hidden2"]; ?>>
            <input type="hidden" id="hidden3" name="hidden3" value=<?php echo $_POST["hidden3"]; ?>>
            <input type="hidden" id="hidden4" name="hidden4" value=<?php echo $_POST["hidden4"]; ?>>
            <input type="hidden" id="hidden5" name="hidden5" value=<?php echo $_POST["hidden5"]; ?>>
            
        </form>
        <p class="success-message" id="successMessage"></p>
        <div class="button-container">
            <button id="resetButton"><i class="fas fa-sync"></i> Reset</button>
            <button id="returnButton"><i class="fas fa-arrow-left"></i> Return to Tickets</button>
        </div>


</div>
<script src="../js/tickets_form.js"></script>

</body>
</html>
