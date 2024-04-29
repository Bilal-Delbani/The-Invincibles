<?php
require_once('../php/functions.php');
$_SESSION['counter'] = 0;
session_start();


// Check if the counter session variable exists
if (!isset($_SESSION['counter'])) {
    // If it doesn't exist, initialize it to 1
    $_SESSION['counter'] = 1;
} else {
    // If it exists, increment the counter
    $_SESSION['counter']++;
}

/* session_destroy();
keep it just for testing.
 */

$conn = connectDB2();

/*Check if:
    1. expectation ='', then the user has not provide his/her expectation yet.
    2. score=NULL, the match did not finish yet so the score is not set.
    3. if the expectation is similar to the score, then a 700 points will be added to the balance of the user.
 */

$id = $_POST['id'];
$match = $_POST['M_id'];

$score = NULL;
$query = "SELECT `SCORE` FROM `tickets_table` WHERE `ID` = $match";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $score = $row['SCORE'];
    }
}

$exp = '';
$query2 = "SELECT `EXPECTATION` FROM `expextation` WHERE `FAN_ID`=$id AND `MATCH_ID`=$match";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $exp = $row['EXPECTATION'];
    }
}
?>
<script>
    var match = "<?php echo $_POST['M_id']; ?>";
</script>

<?php

if ($exp == '') {
    ?>
        <script>
            alert("You did not enter your expectation yet!");
            window.location.assign("../Pages/More.php?id=" + match);
        </script>

    <?php

}
else if ($score == NULL) {
    ?>
        <script>

            /*alert a specific message and return back to the main page */
            alert("The score is not set yet!");
            window.location.assign("../Pages/More.php?id=" + match);
        </script>

    <?php
} else if ($score == $exp) {

    if ($_SESSION['counter'] > 1) {
        ?>
        <script>
            /*alert a specific message and return back to the main page */
            alert("PIZZAAA! You already earned your points ;)");
            window.location.assign("../Pages/More.php?id=" + match);
        </script>

        <?php
    } else {

        $query3 = "UPDATE `fans` SET `points`=`points`+700 WHERE `id`=$id";
        $result3 = mysqli_query($conn, $query3);

        ?>
        <script>
            /*alert a specific message and return back to the main page */
            alert("Congrats! Your expectation was right, 700 points will be added to your balance");
            window.location.assign("../Pages/More.php?id=" + match);
        </script>

        <?php
    }
} else {
    ?>
        <script>
            /*alert a specific message and return back to the main page */
            alert("Your expectation is not right \n Better luck next time ;)");
            window.location.assign("../Pages/More.php?id=" + match);
        </script>

    <?php
}

?>