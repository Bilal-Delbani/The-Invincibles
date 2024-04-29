<!--this page show the matches and their schedule and the prices for each ticket in the stadium 
so the fan can buy online tickets to watch matches-->
<?php
//require the functions that will be used here in this page
    require_once ('../php/functions.php');
    //require_once ('../php/dynamicTickets.php');

session_start();
if(strpos($_SESSION["email"],'.admin')){
  header("location:../index.html");
}
//if no login done before, the user can not access the page and this will take the user back to the login page directly 
if(!isset($_SESSION["username"])){
    header("location:../index.html");
}
//when the purchase is successfully done then the system will redirect to the merchandise page and if the redirection is done correctly
//alert with success purchase is given
if (isset($_GET['redirected']) && $_GET['redirected'] == 'true') {
    echo '<script>alert("Purchase done successfully!");</script>';
}
//if there is no enough money or points with the user to purchase the system will redirect the fan to the merchandise page
//and alert with is given with no available money
if (isset($_GET['wrong']) && $_GET['wrong'] == 'true') {
    echo '<script>alert("You do not have enough money in your system!");</script>';
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Football Matches Tickets</title>
  <!--ticket styling common with the merchandise page-->
  <link href="../css/merchandise.css" rel="stylesheet" />
  <!--icon styling used by the tage name <i></i> -->
  <link href="../css/icons.css" rel="stylesheet" />
  <!--ticket page styling-->
  <link href="../css/tickets.css" rel="stylesheet" />
  <!--favicon-->
  <link rel="shortcut icon" href="../images/fav/ticket.png" type="image/x-icon">
<!--special styling for footer-->

</head>
<body>
<!-- Navigation that has some paths to different pages in our website-->

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="top:0 !important;position: fixed;width:100%; margin-bottom:50px !important; background-color:#E8E8E8 !important; z-index:999">

    <div class="collapse navbar-collapse left" id="navbarSupportedContent" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="About_Real.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="Merchandise.php">Products</a></li>

        </ul>
    </div>
        <!--welcoming the user and button for logging out-->
    <div class="right">
        Welcome <?php echo $_SESSION["username"];?> <button type="button" name="logout" onclick="window.location.href = '../php/signout.php'">SignOut</button>
    </div>


</nav>
<!--table that includes the matches and their information-->
<section class="py-5">
    <div class="ads">
        <div class="news-ticker">
        
            <ul>
                <li>
                  <pre>Front Seats cost: 825$               Middle Seats cost: 594$               Back Seats cost: 330$</pre>
                </li>
        
            </ul>
        </div>
    </div>
  <div style="margin-top:20px;margin-bottom:20px;overflow-y:scroll;">
    <table id="ticketTable" >
      <thead>
        <tr>
          <th>Match</th>
          <th class="not">Opponent</th>
          <th>Competition</th>
          <th>Stadium</th>
          <th>Date</th>
          <th>Time</th>
          <th>Reserve Seat Position</th>
        </tr>
      </thead>
      <tbody>
            <?php echo LoadTicketPage()?>
      </tbody>
    </table>
  </div>
  <!--purchase button that submit the form and directs the fan to the confirmation page to confirm his/her purchase for the ticket(s)-->
    <div class="purchase">
      <form action="ticket_form.php" method="post" id="purchase-form">
          <label id="label" style="pointer-events: none;" disabled>Confirm your Purchase here:</label>
          <button type="button" id="buy" class="Purchase-button" onclick="getTotal()" style="pointer-events: none;" disabled>Purchase</button>              <button type="button" id="clear" class="Purchase-button" onclick="Clear()">Clear</button>

          <!--these hidden inputs will be used to save the price of the ticket chosen by the fan for each match-->
          <input type="hidden" id="hidden1" name="hidden1" value="">
          <input type="hidden" id="hidden2" name="hidden2" value="">
          <input type="hidden" id="hidden3" name="hidden3" value="">
          <input type="hidden" id="hidden4" name="hidden4" value="">
          <input type="hidden" id="hidden5" name="hidden5" value="">
          <input type="hidden" id="total" name="total" value="">

      </form>

    </div>
</section>
<!-- Footer for copy rights-->
    <footer style="bottom:0;width:100%;text-align:center;">
        &copy; 2024 Football Tickets. All rights reserved.
    </footer>
<script src="../js/tickets.js"></script>
<script>
    function Clear(){
        location.reload();
    }
</script>
<style>footer{background-color: #333;color: #fff;padding: 20px;text-align: center;font-size: 14px;}
footer a {color: #fff;text-decoration: none;}.ads{width: 100%;height: 90px;margin-top:10px;}.news-ticker
{font-family: 'Times New Roman', Times, serif;float:right;position: relative;overflow: hidden;height:100%; width: 100%;line-height: 90px;vertical-align: middle;background-color: #222;color:red;}
.news-ticker ul {list-style: none;margin: 0;padding: 0;position: absolute;white-space: nowrap;animation: ticker 7s infinite linear;}
.news-ticker li {display: inline-block;margin-right: 50px;font-size: 24px;}@keyframes 
ticker {0% {left: 0;}50%{left:50%;}100% {left: 100%;}}th{text-align:center;}td{text-align:center;}
.not{text-align:left;}</style>
</body>
</html>
