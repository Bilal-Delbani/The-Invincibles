<?php

// Include the database connection and any necessary functions
include('function.php');
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Check if the action parameter is set
if(isset($_POST["action"]))
{
    // Check the value of the action parameter to determine the operation
    if($_POST["action"] == "Add" || $_POST["action"] == "Update")
    {
        // Handle adding or updating a player record
        $output = array();
        
        // Retrieve data from the POST request
        $player_name = $_POST["player_name"];
        $date_of_birth = $_POST["date_of_birth"];
        $nationality = $_POST["nationality"];
        $email = $_POST["email"];
        $injury_history = $_POST["injury_history"];
        $is_injured = $_POST["is_injured"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $pace = $_POST["pace"];
        $shooting = $_POST["shooting"];
        $passing = $_POST["passing"];
        $dribbling = $_POST["dribbling"];
        $defending = $_POST["defending"];
        $physicality = $_POST["physicality"];
        $heading = $_POST["heading"];
        $composure = $_POST["composure"];
        $other_favorite_positions = $_POST["other_favorite_positions"];
        $communication_skills = $_POST["communication_skills"];
        $leadership_skills = $_POST["leadership_skills"];
        $image_link = $_POST["image_link"];
        $position = $_POST["position"];
        $player_number = $_POST["player_number"];

        if($player_name=="" || $date_of_birth=="" || $nationality=="" || $email=="" || $injury_history=="" || $is_injured=="" || $height=="" || $weight=="" || $pace=="" || $shooting=="" || $passing=="" || $dribbling=="" || $defending=="" || $physicality=="" || $heading=="" || $composure=="" || $other_favorite_positions=="" || $communication_skills=="" || $leadership_skills=="" || $image_link=="" || $position=="" || $player_number=="")
        {
            if($player_name==""){
                $output["player_name_error"] = "Please fill the Player Name field...";
            }
            if($date_of_birth==""){
                $output["date_of_birth_error"] = "Please fill the Birth Date field...";

            }
            if($nationality==""){
                $output["nationality_error"] = "Please fill the Nationality field...";

            }
            if($email==""){
                $output["email_error"] = "Please fill the Email field...";

            }
            if($injury_history==""){
                $output["injury_history_error"] = "Please fill the Injury History field...";

            }
            if($is_injured==""){
                $output["is_injured_error"] = "Please fill if the player is currently injured or not...";

            }
            if($height==""){
                $output["height_error"] = "Please fill the Height field...";

            }
            if($weight==""){
                $output["weight_error"] = "Please fill the Weight field...";

            }
            if($pace==""){
                $output["pace_error"] = "Please fill the Pace field...";

            }
            if($shooting==""){
                $output["shooting_error"] = "Please fill the Shooting field...";

            }
            if($passing==""){
                $output["passing_error"] = "Please fill the Passing field...";

            }
            if($dribbling==""){
                $output["dribbling_error"] = "Please fill the Dribbling field...";

            }
            if($defending==""){
                $output["defending_error"] = "Please fill the Defending field...";

            }
            if($physicality==""){
                $output["physicality_error"] = "Please fill the Physicality field...";

            }
            if($heading==""){
                $output["heading_error"] = "Please fill the Heading field...";

            }
            if($composure==""){
                $output["composure_error"] = "Please fill the Composure field...";

            }
            if($other_favorite_positions==""){
                $output["other_favorite_positions_error"] = "Please fill if the player has other favorite positions...";

            }
            if($communication_skills==""){
                $output["communication_skills_error"] = "Please fill the Communication Skills the player has...";

            }
            if($leadership_skills==""){
                $output["leadership_skills_error"] = "Please fill the Leader Ship Skills the player has...";

            }
            if($image_link==""){
                $output["image_link_error"] = "Please fill the Image field...";

            }
            if($position==""){
                $output["position_error"] = "Please fill the Position field...";

            }
            if($player_number==""){
                $output["player_number_error"] = "Please fill the Player Number field...";

            }
            
            echo json_encode($output);
        }
        else {
            // Prepare data array
            $data = array(
                ':player_name' => $player_name,
                ':date_of_birth' => $date_of_birth,
                ':nationality' => $nationality,
                ':email' => $email,
                ':injury_history' => $injury_history,
                ':is_injured' => $is_injured,
                ':height' => $height,
                ':weight' => $weight,
                ':pace' => $pace,
                ':shooting' => $shooting,
                ':passing' => $passing,
                ':dribbling' => $dribbling,
                ':defending' => $defending,
                ':physicality' => $physicality,
                ':heading' => $heading,
                ':composure' => $composure,
                ':other_favorite_positions' => $other_favorite_positions,
                ':communication_skills' => $communication_skills,
                ':leadership_skills' => $leadership_skills,
                ':image_link' => $image_link,
                ':position' => $position,
                ':player_number' => $player_number
            );

            if($_POST["action"] == "Add")
            {
                // Execute the SQL query to insert a new player record
                $query = "INSERT INTO theplayers_table (PLAYERNAME, DATEOFBIRTH, NATIONALITY, EMAIL, INJURYHISTORY, ISINJURED, HEIGHT, WEIGHT, PACE, SHOOTING, PASSING, DRIBBLING, DEFENDING, PHYSICALITY, HEADING, COMPOSURE, OTHERFAVORITEPOSITIONS, COMMUNICATIONSKILLS, LEADERSHIPSKILLS, IMAGELINK, POSITION, PLAYERNUMBER) 
                VALUES (:player_name, :date_of_birth, :nationality, :email, :injury_history, :is_injured, :height, :weight, :pace, :shooting, :passing, :dribbling, :defending, :physicality, :heading, :composure, :other_favorite_positions, :communication_skills, :leadership_skills, :image_link, :position, :player_number)";

                $statement = $connect->prepare($query);

                if($statement->execute($data))
                {
                    $output["success"] = "<div class='alert alert-success'>New Player Added</div>";
                }
            }
            else if($_POST['action'] == 'Update')
            {
                $id=$_POST["player_id"];
                // Execute the SQL query to update an existing player record
                $query = "UPDATE theplayers_table 
                        SET PLAYERNAME = :player_name, 
                        DATEOFBIRTH = :date_of_birth, 
                        NATIONALITY = :nationality, 
                        EMAIL = :email, 
                        INJURYHISTORY = :injury_history, 
                        ISINJURED = :is_injured, 
                        HEIGHT = :height, 
                        WEIGHT = :weight, 
                        PACE = :pace, 
                        SHOOTING = :shooting, 
                        PASSING = :passing, 
                        DRIBBLING = :dribbling, 
                        DEFENDING = :defending, 
                        PHYSICALITY = :physicality, 
                        HEADING = :heading, 
                        COMPOSURE = :composure, 
                        OTHERFAVORITEPOSITIONS = :other_favorite_positions, 
                        COMMUNICATIONSKILLS = :communication_skills, 
                        LEADERSHIPSKILLS = :leadership_skills, 
                        IMAGELINK = :image_link, 
                        POSITION = :position, 
                        PLAYERNUMBER = :player_number
                        WHERE ID = '".$id."'";

                $statement = $connect->prepare($query);

                if($statement->execute($data))
                {
                    $output["success"] = "<div class='alert alert-success'>Player Updated</div>";
                }
            }

            echo json_encode($output);
        }

    }

    if($_POST['action'] == 'fetch')
    {
        $id=$_POST["id"];
        // Handle fetching player data
        $query = "SELECT * FROM theplayers_table WHERE ID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['player_name'] = $row['PLAYERNAME'];
            $data['date_of_birth'] = $row['DATEOFBIRTH'];
            $data['nationality'] = $row['NATIONALITY'];
            $data['email'] = $row['EMAIL'];
            $data['injury_history'] = $row['INJURYHISTORY'];
            $data['is_injured'] = $row['ISINJURED'];
            $data['height'] = $row['HEIGHT'];
            $data['weight'] = $row['WEIGHT'];
            $data['pace'] = $row['PACE'];
            $data['shooting'] = $row['SHOOTING'];
            $data['passing'] = $row['PASSING'];
            $data['dribbling'] = $row['DRIBBLING'];
            $data['defending'] = $row['DEFENDING'];
            $data['physicality'] = $row['PHYSICALITY'];
            $data['heading'] = $row['HEADING'];
            $data['composure'] = $row['COMPOSURE'];
            $data['other_favorite_positions'] = $row['OTHERFAVORITEPOSITIONS'];
            $data['communication_skills'] = $row['COMMUNICATIONSKILLS'];
            $data['leadership_skills'] = $row['LEADERSHIPSKILLS'];
            $data['image_link'] = $row['IMAGELINK'];
            $data['position'] = $row['POSITION'];
            $data['player_number'] = $row['PLAYERNUMBER'];
        }

        echo json_encode($data);
    }

    if($_POST['action'] == 'delete')
    {
        // Handle deleting a player record
        $output = array();
        
        // Execute the SQL query to delete the player record
        $query = "DELETE FROM theplayers_table WHERE ID = '".$_POST["id"]."'";

        if($connect->query($query))
        {
            $output['success'] = '<div class="alert alert-success">Player Deleted</div>';
        }

        echo json_encode($output);
    }
}

?>
