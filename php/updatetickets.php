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


//VarExist function that checks if the post is done correctly and not accessing a wrong input's name
function VarExist($var){
    
    // if the post is done correctly then the value returned by it is saved in the variable declared
    if (isset($var)){
        return $var;
    }
    // if the calling of the post for a wrong name or one that does not exist then this will return to the index page i.g. to the login page as logout
    else{
        header("location:../index.php");
    }
}




/*get money from banking system to compare it with the payment done by the fan
so if s/he has below the payment amount no purchase is done */
function GetMoney($crdt){
    
    // connecting to the database
    $obj=connectToDB();

    //query that selects the amount of money owned by the fan in the system
    $query = "SELECT `MONEY` FROM `banking-system` WHERE (`CARD_NUMBER`='".$crdt."')";

    $stmt=$obj->query($query);
    while($record=$stmt->fetch()){
        // saving the answer (amount of money) in $answer variable
      $answer= $record["MONEY"];

   }
   //get the money
   return $answer; 
}  





//update money in banking system so the amount of money should decrease when the fan pay a ticket in our system
function updateMoney($crdt,$money){
    //connect to the database
    $obj=connectToDB();

    //query to update the amount of money according to the credit card number of the fan
    $query = "UPDATE `banking-system` SET `MONEY`=MONEY-$money WHERE (`CARD_NUMBER`='".$crdt."')";

    $stmt=$obj->query($query);

}  



/*update the available quantity of tickets found in the system so if any purchase for any ticket done by the fan
the amount of tickets should decrease*/
function updateQuantityofTickets($user2){
    //connect to the database
    $obj=connectToDB();

/*loop over each match and if any purchase done for that match 
(the array[match_index] will not be empty, and if no purchase then array[match-index]=="")
and then if a match is selected to be purchased then the tickets is decreased by 1 from the whole capacity of the stadium
*/
    for($i=0;$i<5;$i++){
        if($user2[$i]!=""){
            $query = "UPDATE `tickets_table` SET `AVAILABLE_QUANTITY`=AVAILABLE_QUANTITY-1 WHERE (`ID`=$i+1)";
            $stmt=$obj->query($query);

        }

    }

}



/*insert the info of the fan that bought the ticket to keep track the information as well as to check if s/he really has a ticket or not
when the fan comes to the stadium to be compared with the system
so using his national id we check his name and gender and check if in the system there is a ticket to him or not*/
function insertToSystem($user,$user2){
    //connect to database
    $obj=connectToDB(); 
    //loop over the array of matches and each one get the opponent, date and information about the fan who purchase that ticket 
    //save this information in the system for tracking information in the system and the status=1 if the purchase is saved correctly
    for($i=0;$i<5;$i++){
        if($user2[$i]!=""){

            //get the opponent from the ticket table 
            $name = "SELECT `Opponent` FROM `tickets_table` WHERE (`ID`=$i+1)";
            $stmt=$obj->query($name);
            while($record=$stmt->fetch()){
              $answer= $record["Opponent"];
        
           }
           //get the date of the match from the table system 
           $date = "SELECT `Date` FROM `tickets_table` WHERE (`ID`=$i+1)";
           $stmt2=$obj->query($date);
           while($record2=$stmt2->fetch()){
             $answer2= $record2["Date"];
       
          }

          //note that opponent and date are not found in the form submission and so we get these info from another table
          //query for inserting the information
            $query = "INSERT INTO `tickets_system` (`USERNAME`,`FIRSTNAME`,`MIDDLENAME`, `LASTNAME`, `Gender`,`Opponent`,`Date`,`Status`)
            VALUES ('$user->username','$user->firstname','$user->middlename','$user->lastname', '$user->gender','$answer', '$answer2', 1)";
            $stmt3=$obj->query($query);
        }

    }

}


//declare a user as object

$user=new stdClass();


//get the info of the user and check the values by VarExist function
$user->firstname=VarExist($_POST["firstname"]);
$user->middlename=VarExist($_POST["middlename"]);
$user->lastname=VarExist($_POST["lastname"]);

$user->username=VarExist($_POST["username"]);
$user->credit=VarExist($_POST["cardNumber"]);
$user->confirm=VarExist($_POST["confirmCardNumber"]);
$user->payment=VarExist($_POST["payment"]);
$user->gender=VarExist($_POST["gender"]);

//declaration of an array to save the value paid for each match by the fan ; 0->match1 .... 4->match5
$user2 = array(
    "0" => VarExist($_POST["hidden1"]),
    "1" => VarExist($_POST["hidden2"]),
    "2" => VarExist($_POST["hidden3"]),
    "3" => VarExist($_POST["hidden4"]),
    "4" => VarExist($_POST["hidden5"]),
);


//check if the amount of money owned by the fan if it is greater than the payment required from him, then purchase is done successfully
if(GetMoney($user->credit)>=$user->payment){
    updateMoney($user->credit,$user->payment);
    insertToSystem($user,$user2);
    updateQuantityofTickets($user2);
    header("location: ../Pages/Tickets.php?redirected=true");

}
//otherwise it is returned to the ticket page
else{
    header("location: ../Pages/Tickets.php?wrong=true");  

}

?>