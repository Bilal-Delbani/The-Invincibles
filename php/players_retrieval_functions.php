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
<?php
/**
 
 * @param int $player_number The player number of the football player.
 * @param string $tableName The name of the table in the database where the football player is stored.
 * @param string $page The name of the page where the container is being displayed.
 

 */

function connectToDB(){
  // database connection details
  $dbhost="localhost";
  $dbname="football_club";
  $dbuser="root";
  $dbpass="";
  $db=null;
  try{
    // create a new PDO instance to connect to the database
    $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
  }
  catch(PDOException $e){
    // print error message and exit if connection fails
    print "Error!:".$e->getMessage()."<br/>";
    die();
  }
  // return the database connection object
  return $db;
}

function  imageLink($PLAYER_NUMBER,$tableName){
  // database connection details
  $dbhost="127.0.0.1";
  $dbname="football_club";
  $dbuser="root";
  $dbpass="";
  $db=null;
  try{
    // create a new PDO instance to connect to the database
    $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
  }
  catch(PDOException $e){
    // print error message and exit if connection fails
    print "Error!:".$e->getMessage()."<br/>";
    die();
  }
  // build SQL query to retrieve image link based on player number and table name
  $query = "SELECT `IMAGELINK` FROM `".$tableName."` WHERE (`PLAYERNUMBER`=$PLAYER_NUMBER)";
  // execute query and fetch results
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
    // store the image link in a variable
    $answer= $record["IMAGELINK"];
  }
  // set image path and filename
  $x="../../images/players_images/";
  $finalanswer=$x.$answer;
  // output the full path and filename of the image
  echo  $finalanswer;
}

function getPlayerAge($PLAYER_NUMBER,$tableName){
  // connect to database
  $db=connectToDB(); 
  // build SQL query to retrieve date of birth based on player number and table name
  $query = "SELECT `DATEOFBIRTH` FROM `".$tableName."`  WHERE (`PLAYERNUMBER`='".$PLAYER_NUMBER."')";
  // execute query and fetch results
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
    // get date of birth from query results
    $answer= $record["DATEOFBIRTH"];
    // calculate age based on date of birth
    $birthDate = new DateTime($answer);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
  }
  // output the calculated age
  echo $age;
}

function getPlayerProperty($PLAYER_NUMBER,$property,$tableName){
  // connect to database
  $db=connectToDB();
  // build SQL query to retrieve a specific property based on player number and table name
  $query = "SELECT `".$property."` FROM `".$tableName."`  WHERE (`PLAYERNUMBER`='".$PLAYER_NUMBER."')";  
  // execute query and fetch results
  $stmt=$db->query($query);
  while($record=$stmt->fetch()){
    // store the property value in a variable
    $answer= $record[$property];
  }
  // output the property value
  echo $answer;
}



// Function to display player information on a web page
function displayPlayerInformation($PLAYER_NUMBER,$tableName,$page){  
?>
<html>
<?php logo() ?>
  <head>
    <title>Player Information</title>
    <link rel="stylesheet" href="../../css/displayPlayers.css">
    <link rel="icon" type="image/x-icon" href="../../images/png/news.png" />

</head>
  <body>
    <header class="header">
      <h1 class="title">Player Information</h1>
    </header>
    <div class="table-wrapper">
      <table class="table">
        <tr>
          <th>Name:</th>
          <td><?php
          // Get player name
          getPlayerProperty($PLAYER_NUMBER,'PLAYERNAME',$tableName)?></td>
        </tr>
        <tr>
          <th>Age:</th>
          <td><?php 
          // Get player age
          getPlayerAge($PLAYER_NUMBER,$tableName)?></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><?php 
          // Get player email
          getPlayerProperty($PLAYER_NUMBER,'EMAIL',$tableName)?></td>
        </tr>
        <tr>
          <th>Nationality:</th>
          <td> <?php 
          // Get player nationality
          getPlayerProperty($PLAYER_NUMBER,'NATIONALITY',$tableName)?></td>
        </tr>
        <tr>
          <th>Injury History:</th>
          <td><?php 
          // Get player injury history
          getPlayerProperty($PLAYER_NUMBER,'INJURYHISTORY',$tableName)?></td>
        </tr>
        <tr>
          <th>Height:</th>
          <td><?php 
          // Get player height
          getPlayerProperty($PLAYER_NUMBER,'HEIGHT',$tableName)?> m</td>
        </tr>
        <tr>
          <th>Weight:</th>
          <td><?php 
          // Get player weight
          getPlayerProperty($PLAYER_NUMBER,'WEIGHT',$tableName)?> lbs</td>
        </tr>
        <?php 
        // If player is a goalkeeper, display additional stats
        if($tableName=="goalkeepers_table"){ 
          keeperPart($PLAYER_NUMBER,$tableName);
        }
        else{
          ?>
           <tr>
            <th>PACE:</th>
            <td><?php 
            // Get player pace
            getPlayerProperty($PLAYER_NUMBER,'PACE',$tableName)?></td>
          </tr>
          <tr>
            <th>SHOOTING:</th>
            <td><?php 
            // Get player shooting
            getPlayerProperty($PLAYER_NUMBER,'SHOOTING',$tableName)?></td>
          </tr>
          <tr>
            <th>PASSING:</th>
            <td><?php 
            // Get player passing
            getPlayerProperty($PLAYER_NUMBER,'PASSING',$tableName)?></td>
          </tr> 
          <tr>
            <th>PHYSICALITY:</th>
            <td><?php 
            // Get player physicality
            getPlayerProperty($PLAYER_NUMBER,'PHYSICALITY',$tableName)?></td>
          </tr>
          <tr>
            <th>HEADING:</th>
            <td><?php 
            // Get player heading
            getPlayerProperty($PLAYER_NUMBER,'HEADING',$tableName)?></td>
          </tr>
          <tr>
            <th>COMPOSURE:</th>
            <td><?php 
            // Get player composure
            getPlayerProperty($PLAYER_NUMBER,'COMPOSURE',$tableName)?></td>
          </tr> 
          <tr>
            <th>OTHER FAVORITE POSITIONS:</th>
            <td><?php getPlayerProperty($PLAYER_NUMBER,'OTHERFAVORITEPOSITIONS',$tableName)?></td>
          </tr>
          <tr> 
          <?php } ?>
          <th>Communication Skills:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'COMMUNICATIONSKILLS',$tableName)?></td>
        </tr>
        <tr>
          <th>Leadership Skills</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'LEADERSHIPSKILLS',$tableName)?></td>
        </tr>
      </table>
    </div>
  </body>
</html>
<?php
}
function backtoPlayers(){?>
  <button class="secondary-button" style="float:left;position:fixed;left:0;bottom:0"><a href="../team.php">Back</a></button>
<?php
}
/**
 * This function retrieves data from the database about football players based on the given position and displays them with their detailed information.
 *
 * @param string $position The position of the football players to retrieve.
 * @param string $tableName The name of the table in the database where the football players are stored.
 *
 * @return void
 */
function displayPlayers($position,$tableName){
  // Connect to the database
  $db=connectToDB();
  
  // Select the player numbers of the football players with the given position from the table
  $query = "SELECT `PLAYERNUMBER` FROM `$tableName` WHERE (`POSITION`='".$position."')";
  $stmt=$db->query($query);
  
  // Loop through each player number and display their information
  $player_number=0;
  while($record=$stmt->fetch()){
      $player_number=$record["PLAYERNUMBER"];
      $page=$position.".php";
      displayContainerPlayers($player_number,$tableName,$page);
   }
}

/**
 * This function displays the container for a football player with their detailed information.
 
 * @param int $player_number The player number of the football player.
 * @param string $tableName The name of the table in the database where the football player is stored.
 * @param string $page The name of the page where the container is being displayed.
 

 */
function displayContainerPlayers($player_number,$tableName,$page){?>
    <div class="players-container">
      <div class="player" style="height:505px;margin-bottom:30px;">
        <img src=<?php
      // Get the image link for the football player and display it
      imageLink($player_number,$tableName)?> alt="Player Image">
        <div class="player-info">
          <h2>
            <span class="number" style="margin-left:20px;"><?php 
        // Get the player number for the football player and display it
        getPlayerProperty($player_number,'PLAYERNUMBER',$tableName);
       ?>.</span>  <?php 
        // Get the player name for the football player and display it
        getPlayerProperty($player_number,'PLAYERNAME',$tableName);?>
          </h2>
          <a class="view-details" href="ViewDetails.php?token=<?php echo $player_number?>&my_table=<?php echo $tableName ?>&page=<?php echo $page ?>">View Details</a>
        </div>
      </div>
    </div>
    <?php 
}



/**
 * This function displays the detailed information for a goalkeeper.
 
 */
function keeperPart($PLAYER_NUMBER,$tableName){
  ?>
   <tr>
          <th>Diving:</th>
          <td><?php 
        // Get the diving stat for the goalkeeper and display it
        getPlayerProperty($PLAYER_NUMBER,'DIVING',$tableName)?></td>
        </tr>
        <tr>
          <th>Handling:</th>
          <td><?php 
        // Get the handling stat for the goalkeeper and display it
        getPlayerProperty($PLAYER_NUMBER,'HANDLING',$tableName)?></td>
        </tr>
        <tr>
          <th>Kicking:</th>
          <td><?php 
        // Get the kicking stat for the goalkeeper and display it
        getPlayerProperty($PLAYER_NUMBER,'KICKING',$tableName)?></td>

       
        <tr>
          <th>Reflexes:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'REFLEXES',$tableName)?></td>
        </tr>
        <tr>
          <th>Speed:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'SPEED',$tableName)?></td>
        </tr>
        <tr>
          <th>Positioning:</th>
          <td><?php getPlayerProperty($PLAYER_NUMBER,'POSITIONING',$tableName)?></td>
        </tr>
        <tr>
          <?php
}
function logo(){
  
}
?>
