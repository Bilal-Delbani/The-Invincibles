<?php
// This function connects to the database using the given credentials and returns the connection object
function connectintoToDB(){
    $dbhost="localhost"; // host of the database
    $dbname="football_club"; // name of the database
    $dbuser="root"; // database username
    $dbpass=""; // initialize the connection object to null

    try{
        // create a new PDO object to connect to the database using the given credentials
        $db= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    }
    catch(PDOException $e){
        // handle any errors that occur during the connection process
        print "Error!:".$e->getMessage()."<br/>";
        die();
    }
    return $db;
}

// This function retrieves a specific field from the news_table in the database based on the given ID
function getNewsfield($property,$ID){
    $db=connectintoToDB(); // connect to the database
    $query = "SELECT `".$property."` FROM `news_table`  WHERE (`ID`='".$ID."')"; // SQL query to retrieve the specified field for the given ID
    $stmt=$db->query($query); // execute the query
    while($record=$stmt->fetch()){
        $answer= $record[$property]; // get the value of the specified field for the given ID
     }
    echo $answer; // display the retrieved value
}

// This function retrieves the date of publication for a news article based on the given ID
function getNewsDateOfPublication($ID){
    $db=connectintoToDB(); // connect to the database
    $query = "SELECT `PUBLISH_DATE` FROM `news_table`  WHERE (`ID`='".$ID."')"; // SQL query to retrieve the date of publication for the given ID
    $stmt=$db->query($query); // execute the query
    while($record=$stmt->fetch()){
        $date_string= $record['PUBLISH_DATE']; // get the date of publication as a string
    }
    $date = DateTime::createFromFormat('Y-m-d', $date_string); // create a DateTime object from the date string
    $day = $date->format('l'); // get the day of the week from the DateTime object
    $month = $date->format('F'); // get the month from the DateTime object
    $year = $date->format('Y'); // get the year from the DateTime object
    $formatted_date = $day . ', ' . $month . ' ' . $year; // format the date string in the desired format
    echo $formatted_date; // display the formatted date string
}

// This function displays all news articles from the news_table in the database
function displayNews(){
    $db=connectintoToDB(); // connect to the database
    $query = "SELECT * FROM `news_table`  WHERE 1 "; // SQL query to retrieve all news articles from the news_table
    $stmt=$db->query($query); // execute the query
    while($record=$stmt->fetch()){
        $id= $record['ID']; // get the ID of the current news article
        displayNewsBlock($id); // call the displayNewsBlock function to display the news article
     }
}
// This function displays a single news block with the given ID
function displayNewsBlock($id){?>
    <div class="col-md-6 col-lg-4" >
        <div class="post-entry" style="height:400px;margin-bottom:30px;">
            <div class="image" style="height:200px;">
                <!-- Display the news image using the getImageLink function -->
                <img src=<?php getImageLink($id)?> alt="Image" class="img-fluid">
            </div>
            <div class="text p-4">
                <h2 class="h5 text-black">
                    <!-- Display the news title as a link to its page using the given ID -->
                    <a href="displayNews.php?token=<?php echo $id?>"><?php getNewsfield('TITLE',$id)?></a>
                </h2>
                <span class="text-uppercase date d-block mb-3">
                    <!-- Display the news author and publication date using the given ID -->
                    <small><?php getNewsfield('AUTHOR',$id)?> &bullet; <?php  getNewsDateOfPublication($id) ?></small>
                </span>
                <!-- Display the news header using the given ID -->
                <p class="mb-0"><?php getNewsfield('HEADER',$id)?></p>
            </div>
        </div>
    </div>          
<?php
}

// This function retrieves the image link for a news article with the given ID
function getImageLink($ID){
    $db=connectintoToDB();
    $query = "SELECT `IMAGELINK` FROM `news_table` WHERE (`ID`='".$ID."')";   
    $stmt=$db->query($query);
    while($record=$stmt->fetch()){
        $answer= $record['IMAGELINK'];
    }
    // Prepend the image link with the news images directory path
    $x="images/news_images/";
    $finalanswer=$x.$answer;
    $x="../images/";
    $finalanswer=$x.$answer;
    // Echo the final image link
    echo  $finalanswer;   
}
?>