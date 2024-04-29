<?php
include('function.php');

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if(isset($_POST["action"])) {
    if($_POST["action"] == 'Add' || $_POST["action"] == 'Update') {

        $output = array();
        // Retrieve data from POST request
        $opponent_name = $_POST["opponent_name"];
        $competition = $_POST["competition"];
        $date = $_POST["date"];
        $stadium = $_POST["stadium"];
        $game_condition = $_POST["gcondition"];
        $game_week = $_POST["week"];
        $image_link = $_POST["img"];
        $time = $_POST["time"];
        $team_score = $_POST["Tscore"];
        $opponent_score = $_POST["Oscore"];
        $team_scorers = $_POST["Tscorers"];
        $opponent_scorers = $_POST["Oscorers"];

        if($opponent_name=="" || $competition=="" || $date=="" || $stadium=="" || $game_condition=="" || $game_week=="" || $image_link=="" || $time=="" || $team_score=="" || $opponent_score=="")
        {
            if($opponent_name==""){
                $output["opponent_name_error"] = "Please fill the Opponent Name field...";
    
            }
            if($competition==""){
                $output["competition_error"] = "Please fill the Competition field...";
            }
            if($date==""){
                $output["date_error"] = "Please fill the Date field...";
            }
            if($stadium==""){
                $output["stadium_name_error"] = "Please fill the Stadium Name field...";
    
            }
            if($game_condition==""){
                $output["game_condition_error"] = "Please fill the Game Condition field...";
            }
            if($game_week==""){
                $output["game_week_error"] = "Please fill the Game Week field...";
            }
            if($image_link==""){
                $output["image_link_error"] = "Please fill the Image Link field...";
            }
            if($time==""){
                $output["time_error"] = "Please fill the Time field...";
    
            }
            if($team_score==""){
                $output["team_score_error"] = "Please fill the Team Score field...";
            }
            if($opponent_score==""){
                $output["opponent_score_error"] = "Please fill the Opponent Score field...";
            }
            echo json_encode($output);
        }

        else{
                    // Prepare data array
            $data = array(
            ':opponent_name' => $opponent_name,
            ':competition' => $competition,
            ':date' => $date,
            ':stadium' => $stadium,
            ':game_condition' => $game_condition,
            ':game_week' => $game_week,
            ':image_link' => $image_link,
            ':time' => $time,
            ':team_score' => $team_score,
            ':opponent_score' => $opponent_score,
            ':team_scorers' => $team_scorers,
            ':opponent_scorers' => $opponent_scorers
            );

            if($_POST["action"] == "Add")
            {
                $query = "INSERT INTO results_table (OPPONENT_NAME, COMPETITION, DATE, STADIUM, GAME_CONDITION, GAME_WEEK, IMAGELINK, TIME, TEAM_SCORE, OPPONENT_SCORE, TEAM_SCORERS, OPPONENT_SCORERS) 
                        VALUES (:opponent_name, :competition, :date, :stadium, :game_condition, :game_week, :image_link, :time, :team_score, :opponent_score, :team_scorers, :opponent_scorers)";

                $statement = $connect->prepare($query);

                if($statement->execute($data))
                {
                    $output["success"] = "<div class='alert alert-success'>New Result Added</div>";
                }

            }
            else if($_POST['action'] == 'Update')
            {
                $id=$_POST["customer_id"];
                // Execute the appropriate SQL query to update an existing user record
                $query = "UPDATE results_table 
                        SET OPPONENT_NAME = :opponent_name, 
                            COMPETITION = :competition, 
                            DATE = :date, 
                            STADIUM = :stadium, 
                            GAME_CONDITION = :game_condition, 
                            GAME_WEEK = :game_week, 
                            IMAGELINK = :image_link, 
                            TIME = :time, 
                            TEAM_SCORE = :team_score, 
                            OPPONENT_SCORE = :opponent_score,
                            TEAM_SCORERS = :team_scorers, 
                            OPPONENT_SCORERS = :opponent_scorers
                        WHERE ID = '".$id."'";

                $statement = $connect->prepare($query);

                if($statement->execute($data))
                {
                    $output["success"] = "<div class='alert alert-success'>Result Updated</div>";
                }
            }

      

            echo json_encode($output);
        }
    }

    if($_POST['action'] == 'fetch') {
        $id=$_POST["id"];
        $query = "SELECT * FROM results_table WHERE ID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['opponent_name'] = $row['OPPONENT_NAME'];
            $data['competition'] = $row['COMPETITION'];
            $data['date'] = $row['DATE'];
            $data['stadium'] = $row['STADIUM'];
            $data['game_condition'] = $row['GAME_CONDITION'];
            $data['game_week'] = $row['GAME_WEEK'];
            $data['image'] = $row['IMAGELINK'];
            $data['time'] = $row['TIME'];
            $data['team_score'] = $row['TEAM_SCORE'];
            $data['opponent_score'] = $row['OPPONENT_SCORE'];
            $data['team_scorers'] = $row['TEAM_SCORERS'];
            $data['opponent_scorers'] = $row['OPPONENT_SCORERS'];

        }

        echo json_encode($data);

    }

    if($_POST['action'] == 'delete') {
        $id = $_POST["id"];
        $query = "DELETE FROM results_table WHERE ID = $id";

        if($connect->query($query)) {
            $output['success'] = '<div class="alert alert-success">Result Deleted</div>';
        }

        echo json_encode($output);
    }
}
?>
