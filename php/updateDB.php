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


//function that insert data about the user that make the purchase of a certain merchandise(s)
//in order to keep track about the operations done in our system
function insertToSystem($user){
  
    $obj=connectToDB(); 
    $query = "INSERT INTO `system` (`USERNAME`, `ADDRESS`, `SHOES`, `BALLS`,`SHIRTS`,`GLOVES`,`BIBS`,`VESTS`,`SKELETONS`,`SCARVES`, `PAYMENT`, `TIME`)
    VALUES ('$user->username','$user->address', $user->hidden1,$user->hidden2,$user->hidden3,$user->hidden4,$user->hidden5,$user->hidden6,$user->hidden7,$user->hidden8, '".($user->payment+intval(($user->points*50)/200))."', NOW())";
    $stmt=$obj->query($query);
    
}




/*get money from banking system to compare it with the payment done by the fan
so if s/he has below the payment amount no purchase is done */
function GetMoney($crdt){
    
    $obj=connectToDB();

    
    $query = "SELECT `MONEY` FROM `banking-system` WHERE (`CARD_NUMBER`='".$crdt."')";

    $stmt=$obj->query($query);
    while($record=$stmt->fetch()){
      $answer= $record["MONEY"];

   }
   return $answer; 
}  



//update money in banking system so the amount of money should decrease when the fan pay a ticket in our system

function updateMoney($crdt,$money){
    
    $obj=connectToDB();

    
    $query = "UPDATE `banking-system` SET `MONEY`=MONEY-$money WHERE (`CARD_NUMBER`='".$crdt."')";

    $stmt=$obj->query($query);

}  


//update quantities in product table so when the fan purchase successfully the amount of products purchased should be decreased

function updateQuantityofItems($user2){
    
    $obj=connectToDB();

    for($i=0;$i<8;$i++){
        //loop over the items in the system and each item is decreased by the amount purchased by the fan for that item (saved in the array:user2)
        $query = "UPDATE `products_table` SET `AVAILABLE_QUANTITY`=`AVAILABLE_QUANTITY` - :quantity WHERE `ID`=:id";
        $stmt = $obj->prepare($query);
        $stmt->bindValue(':quantity', intval($user2[$i]), PDO::PARAM_INT);
        $stmt->bindValue(':id', $i+1, PDO::PARAM_INT);
        $stmt->execute();

    }
    


}  


//update points in points table
//so if any fan use points besides the cash money (200 points===50$) then the point should be updated and decreased by how much the fan use points

function updatePoints($user,$points){
    
    $obj=connectToDB();

    
    $query = "UPDATE `fans` SET `points`=points-$points WHERE (`id`='".$user."')";

    $stmt=$obj->query($query);

}  



/*update offer in points table
as our system gives offers so that each 500$ cash the fan win 200 points to use them later
300$ === 0 points
1000$ === 400 points
500$ === 200 points 
and so on (200 points/offer)*/

function updateOffer($user,$offer){
    
    $obj=connectToDB();

    
    $query = "UPDATE `fans` SET `points`=points+($offer*200) WHERE (`id`='".$user."')";

    $stmt=$obj->query($query);

}  








//get points from points table to display it in the page of merchandise
//so the fan keep knowing for his ability to purchase

function GetPoints($user){
    $obj=connectToDB();

    
    $query = "SELECT `points` FROM `fans` WHERE (`id`='".$user."')";

    $stmt=$obj->query($query);
    while($record=$stmt->fetch()){
      $answer= $record["points"];

   }    
   return $answer;
   

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



//declare a user as object

$user=new stdClass();


//get the info of the user and check the values by VarExist function
$user->username=VarExist($_POST["username"]);
$user->credit=VarExist($_POST["cardNumber"]);
$user->confirm=VarExist($_POST["confirmCardNumber"]);
$user->payment=VarExist($_POST["payment"]);
$user->address=VarExist($_POST["address"]);
$user->points=VarExist($_POST["points"]);

//get the quantities chosen of each item by the user to use them in insertion the info in the database
$user->hidden1=VarExist($_POST["hidden1"]);
$user->hidden2=VarExist($_POST["hidden2"]);
$user->hidden3=VarExist($_POST["hidden3"]);
$user->hidden4=VarExist($_POST["hidden4"]);
$user->hidden5=VarExist($_POST["hidden5"]);
$user->hidden6=VarExist($_POST["hidden6"]);
$user->hidden7=VarExist($_POST["hidden7"]);
$user->hidden8=VarExist($_POST["hidden8"]);

//declaration of an array to save the quantity paid for each item by the fan ; 0->item1 .... 7->item8
// but this array will be easier to work with is in the updating the quantites of item

$user2 = array(
    "0" => VarExist($_POST["hidden1"]),
    "1" => VarExist($_POST["hidden2"]),
    "2" => VarExist($_POST["hidden3"]),
    "3" => VarExist($_POST["hidden4"]),
    "4" => VarExist($_POST["hidden5"]),
    "5" => VarExist($_POST["hidden6"]),
    "6" => VarExist($_POST["hidden7"]),
    "7" => VarExist($_POST["hidden8"])
);


//calculate the offer given to the user
//pay 500 gets 1 offer == 200 points == 100$
//pay 1000 gets 2 offers == 400 points == 50$

$offer = intval($user->payment/500);

//check if the amount of money and points owned by the fan if it is greater than the payment required from him, then purchase is done successfully

if(GetMoney($user->credit)>=$user->payment && GetPoints($user->username)>=$user->points){
    updatePoints($user->username,$user->points);
    updateOffer($user->username,$offer);
    updateMoney($user->credit,$user->payment);
    insertToSystem($user);
    updateQuantityofItems($user2);
    header("location: ../Pages/Merchandise.php?redirected=true");

}
//otherwise it is returned to the merchandise page
else{
    header("location: ../Pages/Merchandise.php?wrong=true");  

}





?>

