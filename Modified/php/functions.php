<?php
//connect to the database phpMyAdmin
function connectToDB(){
    $dbhost="localhost";
    $dbname="football_club";
    $dbuser="root";
    $dbpass="";

    $db=null;

    //make a db object that connects to the database
    try{
        $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    }
    //send an error message if the connection is wrong
    catch(PDOException $e){
        print "Error!:".$e->getMessage()."<br/>";
        die();
    }
    // return db so it can be saved in a variable that calls the connectToDB function
    return $db;
}

function connectDB2()
{
    $dbhost="localhost";
    $dbname="football_club";
    $dbuser="root";
    $dbpass="";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Check for errors in the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

/* DISPLAY PRICES of items according to its name*/

function displayPrice($ProductName){
    $obj=connectToDB();
    
    $query = "SELECT `PRICE` FROM `products_table` WHERE (`PRODUCT_NAME`='".$ProductName."')";

    $stmt=$obj->query($query);
    while($record=$stmt->fetch()){
      $parse=number_format($record["PRICE"], 2, '.', '');
      echo "&nbsp$".$parse."&nbsp&nbsp";

   }    
   

}


/* GET PRICES of each item TO ADD TO CART that will be used to update the money an purchasing process */

function GetPrice($ProductName){
    $answer = ''; // Define $answer with an empty string

    $obj=connectToDB();

    
    $query = "SELECT `PRICE` FROM `products_table` WHERE (`PRODUCT_NAME`='".$ProductName."')";

    $stmt=$obj->query($query);
  while($record=$stmt->fetch()){
      $answer= $record["PRICE"];

   }    
   $string= strval($answer);
   return $string;
   

}



/* GET QUANTITIES OF PRODUCTS to use in the purchasing process when we need to update the quantites and to check 
if the fan is selecting any item that is initialy zero in the system*/

function GetQuantity($ProductName){
    $answer = ''; // Define $answer with an empty string


    $obj=connectToDB();

    
    $query = "SELECT `AVAILABLE_QUANTITY` FROM `products_table` WHERE (`PRODUCT_NAME`='".$ProductName."')";

    $stmt=$obj->query($query);
  while($record=$stmt->fetch()){
      $answer= $record["AVAILABLE_QUANTITY"];

   }
   $string= strval($answer);
   return $string; 
}  






 //DISPLAY THE POINTS owned by each fan
function displayPoints($FANNAME){
    $obj=connectToDB();

    
    $query = "SELECT `points` FROM `fans` WHERE (`USERNAME`='".$FANNAME."')";

    $stmt=$obj->query($query);
   while($record=$stmt->fetch()){
      return $record["points"];

   }    
   

}

 //DISPLAY THE Images of Items according to their name
 function displayImage($IMGNAME){
    $obj=connectToDB();

    
    $query = "SELECT `product_image` FROM `products_table` WHERE (`PRODUCT_NAME`='".$IMGNAME."')";

    $stmt=$obj->query($query);
   while($record=$stmt->fetch()){
      return $record["product_image"];

   }    
   

}


/* GET POINTS to check when purchasing */

function GetPoints($ProductName){
    $obj=connectToDB();

    
    $query = "SELECT `Total` FROM `points` WHERE (`id`='".$_SESSION['id']."')";

    $stmt=$obj->query($query);
    while($record=$stmt->fetch()){
      $answer= $record["Total"];

   }    
   return $answer;
   

}




//VarExist function
function VarExist($var){
    if (isset($var)){
        return $var;
    }else{
        header("location:../index.php");
    }
}









function LoadTicketPage()
{
    $obj=connectToDB();

    $query = "SELECT * FROM tickets_table";
    $statement = $obj->prepare($query);
    $statement->execute(); 
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $count=0;
    $output = '';
    foreach ($result as $row) {
        $count++;
        $output .= '<tr>';
        $output .= "<td><a href='More.php?id=$count'>Match $count</a></td>";
        $output .= "<td class='not'><i class='icons' style='background-image: url({$row["ICON_LINK"]})'></i>{$row["OPPONENT"]}</td>";
        $output .= '<td>' . $row["COMPETITION"] . '</td>';
        $output .= '<td>' . $row["STADIUM"] . '</td>';
        $output .= "<td id='" . ($count - 1) . "'>" . $row["DATE"] . "</td>";
        $output .= '<td>' . $row["TIME"] . '</td>';

        $output .= '<td>';
        $output .= '<div>Front:<input style="margin-right:-15px;" type="radio" id="F" name="match' . $count . '" value="825" onclick="handleCheckbox' . $count . '(this)"></div>';
        $output .= '<div>Middle:<input  style="margin-right:-3.5px;" type="radio" id="M" name="match' . $count . '" value="594" onclick="handleCheckbox' . $count . '(this)"></div>';
        $output .= '<div>Back:<input style="margin-right:-18px;" type="radio" id="B" name="match' . $count . '" value="330" onclick="handleCheckbox' . $count . '(this)"></div>';
        $output .= '</td>';
        $output .= '</tr>';
    }
    return $output;
}










/* This function will fetch all the users who provide a ride in an array to display it on a table in the main page */
function FetchUsers($match)
{
    $db = connectToDB();
    $query = "SELECT * FROM `carpool` WHERE `MATCH_ID`=$match AND `PHONE`=''"; 
    //echo $query;
    $stmt = $db->query($query);
    $a_users = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
        $a_users[] = $obj;
    }
    return $a_users;
}

/*Get the fans who reserve a seat with users in an array and 
display it as table*/

function GetPassengers($id, $match)
{

    $db = connectToDB();
    $query = "SELECT `PASSENGER_ID`, `LOCATION`, `PHONE` FROM `carpool` WHERE `DRIVER_ID`= $id AND `MATCH_ID`=$match AND `PHONE` != '' ";
    $stmt = $db->query($query);
    $a_users = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
        $a_users[] = $obj;
    }
    return $a_users;
}

/* This will only get the firstname and lastname of the user */
function GetNames($arg)
{
    $conn = connectDB2();

    $query = "SELECT USERNAME FROM fans WHERE ID=$arg";

    $result = mysqli_query($conn, $query);
    $username='';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['USERNAME'];
        }
    } 
    else {
        echo 'False';
    }

    echo $username;
    return true;
}

/* This function will retrieve the capacity and available value from the database for all drive providers.
    If the Availablity is = 1 (available) then it will return the capacity.
    else it will return "C" as a mean of of complete seats. */
function CheckAvailbility($arg)
{
    $conn = connectDB2();

    $query = "SELECT CAPACITY, AVAILABLE FROM `carpool` WHERE `CARPOOL_ID` = $arg AND `PHONE`='' ";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $av = $row['AVAILABLE'];
            $capacity = $row['CAPACITY'];
        }
    }

    if ($av && $capacity > 0) {
        return $capacity;
    } else {
        $query = "UPDATE `carpool` SET `AVAILABLE`= 0 WHERE `CARPOOL_ID`=$arg";
        $result = mysqli_query($conn, $query);
        return "C";
    }
}

/*Get the opponent name and return it*/
function GetOpponent($arg)
{
    $conn = connectDB2();
    $query = "SELECT `OPPONENT` FROM `tickets_table` WHERE `ID` = $arg";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Op = $row['OPPONENT'];
        }
    }
    echo "$Op";
}

/* This function will retrieve everything from the carpool table, but our main concer is the capacity:
    if the capacity is equal to 0. then it will not do anything,
    else, it will decrement the capacity from the DB and insert the new user who reserve a seat
    in the DB with the user's phone number specifically which is an input field */

function AddFan($carpool_id, $arg, $pass_id)
{
    $conn = connectDB2();
    $query = "SELECT * FROM `carpool` WHERE `CARPOOL_ID` = $carpool_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $CAPACITY = $row['CAPACITY'];
            $D_ID = $row['DRIVER_ID'];
            $M_ID = $row['MATCH_ID'];
            $LOCATION = $row['LOCATION'];
            $AV = $row['AVAILABLE'];

            if ($CAPACITY > 0) {
                $query2 = "UPDATE `carpool` SET `CAPACITY`=`CAPACITY`-1 WHERE `CARPOOL_ID`=$carpool_id";
                $result2 = mysqli_query($conn, $query2);

                $query3 = "INSERT INTO `carpool`(`CARPOOL_ID`, `DRIVER_ID`, `PASSENGER_ID`, `MATCH_ID`, `LOCATION`, `CAPACITY`, `AVAILABLE`, `PHONE`) VALUES ($carpool_id,$D_ID,$pass_id, $M_ID,'$LOCATION',0,$AV,'$arg')";
                $result3 = mysqli_query($conn, $query3);
            }

        }
    }

    return true;
}

/* Get the expectation from the user for a specific match and return it to be displayed in the main page*/

function checkScore($arg, $match)
{

    $conn = connectDB2();
    $query = "SELECT `EXPECTATION` FROM `expextation` WHERE `FAN_ID`=$arg AND `MATCH_ID`=$match";
    $result = mysqli_query($conn, $query);
    $score = NULL;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $score = $row['EXPECTATION'];
        }
    }

    return $score;
}

/* Get the feedback from the user and display it in the main page of the admin*/

function checkFeed($arg)
{

    $conn = connectDB2();
    $query = "SELECT `FEEDB` FROM `feedback` WHERE `FAN_ID`=$arg";
    $result = mysqli_query($conn, $query);
    $fb = NULL;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fb = $row['FEEDB'];
        }
    }

    return $fb;
}

?>


