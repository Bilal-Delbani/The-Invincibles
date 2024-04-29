<?php
include('function.php');
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
if(isset($_POST["action"])) {
    if($_POST["action"] == 'Add' || $_POST["action"] == 'Update') {

        $output = array();
        // Retrieve data from POST request
        $icon = $_POST["icon"];
        $opp = $_POST["opp"];
        $competition = $_POST["competition"];
        $stadium= $_POST["stadium"];
        $quantity= $_POST["quantity"];
        $date = $_POST["date"];
        $time= $_POST["time"];
        $score= $_POST["score"];


        if($icon == "" || $opp=="" || $competition=="" || $stadium=="" || $quantity=="" || $date=="" || $time==""){
            if($icon == ""){
                $output["icon_error"] = "Please fill the Opponent Icon Link field...";

            }
            if($opp==""){
                $output["opp_error"] = "Please fill the Opponent Name field...";

            }
            if($competition==""){
                $output["competition_error"] = "Please fill the Competition field...";

            }
            if($stadium==""){
                $output["stadium_error"] = "Please fill the Stadium Name field...";

            }
            if($quantity == ""){
                $output["quantity_error"] = "Please fill the Available Quantity field...";

            }
            if($date==""){
                $output["date_error"] = "Please fill the Match Date field...";

            }
            if($time==""){
                $output["time_error"] = "Please fill the Match Time field...";

            }

            echo json_encode($output);
        }

        else{
            $data = array(
                ':icon' => $icon,
                ':opp' => $opp,
                ':competition' => $competition,
                ':stadium' =>$stadium,
                ':quantity' =>$quantity,
                ':date' =>$date,
                ':time' =>$time,
                ':score' =>$score

            );

            if($_POST['action'] == 'Add'){
                $query = "INSERT INTO tickets_table (ICON_LINK, OPPONENT, COMPETITION,STADIUM,AVAILABLE_QUANTITY,DATE,TIME,SCORE) 
                          VALUES (:icon, :opp, :competition,:stadium,:quantity,:date,:time,:score)";

                $statement = $connect->prepare($query);
                    
                if($statement->execute($data)) {
                    $output['success'] = '<div class="alert alert-success">New Ticket Added</div>';
                }
            }
    
            else if($_POST['action'] == 'Update') {
                $id=$_POST["customer_id"];
                // Execute the appropriate SQL query to update an existing user record
                $query = "UPDATE tickets_table 
                        SET ICON_LINK = :icon, 
                            OPPONENT = :opp, 
                            COMPETITION = :competition, 
                            STADIUM = :stadium,
                            AVAILABLE_QUANTITY = :quantity, 
                            DATE = :date, 
                            TIME = :time,
                            SCORE = :score

                        WHERE ID = '".$id."'";
                $statement = $connect->prepare($query);
    
                if($statement->execute($data)) {
                    $output['success'] = '<div class="alert alert-success">Ticket Updated</div>';
                }
            
            }
    
            echo json_encode($output);
        }
    }


    if($_POST['action'] == 'fetch') {
        $id=$_POST["id"];
        $query = "SELECT * FROM tickets_table WHERE ID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['icon'] = $row['ICON_LINK'];
            $data['opp'] = $row['OPPONENT'];
            $data['competition'] = $row['COMPETITION'];
            $data['stadium'] = $row['STADIUM'];
            $data['quantity'] = $row['AVAILABLE_QUANTITY'];
            $data['date'] = $row['DATE'];
            $data['time'] = $row['TIME'];
            $data['score'] = $row['SCORE'];
        }
        echo json_encode($data);

    }
    if($_POST['action'] == 'delete') {
        $id = $_POST["id"];
        $query = "DELETE FROM tickets_table WHERE ID = $id";

        if($connect->query($query)) {
            $output['success'] = '<div class="alert alert-success">Ticket Deleted</div>';
        }

        echo json_encode($output);
    }
}
?>
