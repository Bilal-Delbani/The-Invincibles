<?php require_once('../php/functions.php');

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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--about More page design-->
  <link rel="stylesheet" href="../css/More.css">
  <!--about merchandise page design-->
  <link rel="stylesheet" href="../css/About_Merchandise.css">
  <link rel="icon" href="../images/favicon.png">

  <!--about merchandise page design common with about ticket page design -->
  <link rel="stylesheet" href="../css/About.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Invincibles vs <?php echo GetOpponent($_GET['id']); ?>
  </title>
</head>



<body>
  <div class="carpool">

    <!-- 
    1- We will first get the Oppopnent from the DB and specify the order of the score.
    2- Check if the user did not expect the result yet:
      a. if they do expect the result, we will print their score and they cannot expext any other result on the same match.
      b. else if they did not, we will present them by a form to enter their ecpectation and send it to DB.
  -->
    <body>
      <h2>Provide Expectation:</h2>
      <h5>If your expectation was right you will gain 700 points!</h5>
      <h6>Your expectation should be in this order: The Invincibles - <?php echo GetOpponent($_GET['id']); ?>
      </h6>

      <?php if (checkScore($_SESSION['id'] /*Fan_id*/,  $_GET['id'] /* Match_ID */) == NULL) { ?>
        <form id="myForm" action="../php/expectation.php" method="post">
          <input type="text" id="Exp" name="Exp" class="Expectation" placeholder="0-0" required>
          <input type="hidden" name="match" value="<?php echo $_GET['id']; ?>"> 
          <input type="hidden" name="id" value="<?php echo $_SESSION['id']  ?> "> <!-- value="FAN_ID"-->
          <input type="submit" value="submit">
        </form>
      <?php } else
        echo "Your expected score is " . checkScore($_SESSION['id'] /*Fan_id*/, $_GET['id'] /* Match_ID */) . "" ?>
        <br><br>



        <form id="points-form" action="../php/Points.php" method="post">
          <input type="submit" id="collect-points-button" value="Collect Points">
          <input type="hidden" name="M_id" value="<?php echo $_GET['id']; ?>"> <!-- value="Match_ID"-->
          <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>"> <!-- value="FAN_ID"-->
        </form>
        <hr><br>



        <!-- 
    We will check first if the user did not provide any feedback yet.
        a. if they do provide their feedback, we will print for the user a "thank you" message.
        b. else if they did not, we will provide them a form where they can type their feedback and send it to DB.
  -->

        <h2>Provide Feedback:</h2>
        <h5>This will help us improve our website to meet your needs!</h5>
      <?php if (checkFeed($_SESSION['id'] /*Fan_id*/) == NULL) { ?>
        <form id="myForm" action="../php/feedback.php" method="post">
          <input type="text" id="FB" name="FB" class="Expectation" placeholder="Enter a text..." required>
          <input type="hidden" name="M_id" value="<?php echo $_GET['id']; ?>"> <!-- value="Match_ID"-->
          <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>"> <!-- value="FAN_ID"-->
          <input type="submit" value="submit">
        </form>
      <?php } else
        echo "Thank you for your feedback! We will take it into consideration."; ?>
      <br>

      <br><br>
      <hr><br>



      <h2>Carpooling:</h2>
      <!-- 
    We will get all the users who provide a ride and put them on an array to display them on a table.
    -->
      <?php $a_users = FetchUsers($_GET['id'] /*Match_ID*/) ?>

      <!-- 
    This form allows users to select a location from the dropdown list and submit the form to perform a filter action based on the selected location. 
    The submitted form data can be processed using PHP to filter and display the desired results.
    The PHP code retrieves the unique locations from an array $a_users using array_column() and array_unique() functions. 
    Then, a foreach loop is used to iterate over the locations and generate an <option> element for each location. 
    The value attribute of the option is set to the location value, and the location name is displayed as the text content of the option.
    -->
      <form method="post">
        <label for="location">Filter by location:</label>
        <select name="location" id="location">
          <option value="">All locations</option>
          <?php
          $locations = array_unique(array_column($a_users, 'LOCATION'));
          foreach ($locations as $location) {
            ?>
            <option value="<?php echo $location ?>"><?php echo $location ?></option>
            <?php
          }
          ?>
          
        </select>
        <input type="submit" value="Filter">
      </form>


      <!-- display the table -->
      <table class="my-table">
        <thead>
          <tr>
            <th>Driver Name</th>
            <th>Address:<br>From</th>
            <th>Availability</th>
            <th>Reserve A seat</th>
          </tr>
        </thead>

        <!-- display the table to show the rides to the match with a specific filtered location  -->
        <?php
        $filtered_users = $a_users;
        if (isset($_POST['location']) && $_POST['location'] !== '') {
          $filtered_users = array_filter($filtered_users, function ($user) {
            return $user->LOCATION === $_POST['location'];
          });
        }

        foreach ($filtered_users as $i => $user) {
          ?>
          <tbody name="tbody">
            <tr>
              <td>
                <!-- display the name of the fan that has the car and provides the ride -->
                <?php GetNames($user->DRIVER_ID) ?>
              </td>
              <td>
                <!-- display the location of the ride -->
                <?php echo $user->LOCATION ?>
              </td>
              <td>
                <!-- display the capacity, if it is full it will display "C" -->
                <?php echo CheckAvailbility($user->CARPOOL_ID) ?>
              </td>
              <td>

                <!-- display the name of the fan that has the car and provides the ride -->
                <?php


                /* 1- if the capacity is not full (!=0), a form will be displayed for the user to enter their phone numbered and it will be added to the DB
                   2- else if the capacity is full, the form will not be dispayed, and rather "C" will be displayed which means it is complete*/

                if (CheckAvailbility($user->CARPOOL_ID) != "C") {
                  ?>
                  <form method="post" action="../php/Reserve.php">
                    <label for="phone">Put your number here:</label>
                    <input type="text" placeholder="00-111222" name="phoneNumber" style="width: 93%;" required>
                    <input type="hidden" name="carpool_id" value="<?php echo $user->CARPOOL_ID ?>">
                    <input type="hidden" name="Fan_id" value="<?php echo $_SESSION['id'] ?>"> 
                    <input type="hidden" name="row" value="<?php echo $i ?>">
                    <input type="hidden" name="M_id" value="<?php echo $_GET['id'] ?>"> <!-- value="Match_ID"-->
                    <input type="submit" value="Reserve">
                  </form>
                <?php } else echo "C"; ?>
                </td>
              </tr>
            </tbody>
          <?php
        }
        ?>
      </table>


      <!-- a popup form will be displayed when the user click on "Add a drive", and the user should fill this form
    which contains the location of the ride and the capacity and then it will be sent to DB. -->
      <button onclick="openPopup()" class="AddDrive">Add a drive</button>

      <div id="myPopup" class="popup">
        <form action="../php/AddCarpool.php" method="post">
          <span class="close" onclick="closePopup()">&times;</span>
          <input type="text" placeholder="Location" name="Add" required>
          <input type="number" placeholder="Capacity" name="Capacity" required>
          <input type="hidden" name="match" value="<?php echo $_GET['id'] ?>"> 
          <input type="hidden" name="d_id" value="<?php echo $_SESSION['id'] ?>">
          <input type="submit" value="Add">
        </form>
      </div>

      <br><br>
      <hr><br>

      <!-- this section will display a table which contains the name, location, and phone number of the people
    who reserve a seat with the user if the user added a drive for a specific match. -->
      <h2 style="font-size: 30px">These are the phone numbers of the fans who reserve a seat with you</h2>
      <h3 style="color: red">Call them to manage the meeting</h3>
      <?php $a_users2 = GetPassengers($_SESSION['id']  /*Fan_id*/, $_GET['id'] /* Match_ID */); ?>
      <table class="my-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Phone number</th>
          </tr>
        </thead>
        <?php

        for ($i = 0; $i < sizeof($a_users2); $i++) {
          ?>
          <tbody name="tbody">
            <tr>
              <td>
                <?php GetNames($a_users2[$i]->PASSENGER_ID) ?>
              </td>
              <td>
                <?php echo $a_users2[$i]->LOCATION ?>
              </td>
              <td>
                <?php echo $a_users2[$i]->PHONE ?>
              </td>
            </tr>
          </tbody>
          <?php
        }
        ?>
      </table>
        <a href="Tickets.php">
        <div class="button-container">
            <button id="returnButton"><i class="fas fa-arrow-left"></i>Return to Tickets</button>
        </div>
        </a>

      

  </div>
  <script src="../js/More.js"></script>
</body>
</html>



