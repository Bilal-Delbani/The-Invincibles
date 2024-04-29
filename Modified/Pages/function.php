<?php

// function.php
$dbhost = "localhost";
$dbname = "football_club";
$dbuser = "root";
$dbpass = "";

$connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);



function fetch_all_news($connect)
{
    $query = "SELECT * FROM news_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
                <td>' . $row["TITLE"] . '</td>
                <td>' . $row["AUTHOR"] . '</td>
                <td>' . $row["PART_ONE"] . '</td>
                <td>' . $row["PART_TWO"] . '</td>
                <td>' . $row["PART_THREE"] . '</td>
                <td>' . $row["PUBLISH_DATE"] . '</td>
                <td>' . $row["HEADER"] . '</td>
                <td>' . $row["IMAGELINK"] . '</td>

                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["ID"] . ')">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}


function count_all_news($connect)
{
    $query = "SELECT * FROM news_table";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}


function fetch_all_results($connect)
{
    $query = "SELECT * FROM results_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
                <td>' . $row["OPPONENT_NAME"] . '</td>
                <td>' . $row["COMPETITION"] . '</td>
                <td>' . $row["DATE"] . '</td>
                <td>' . $row["STADIUM"] . '</td>
                <td>' . $row["GAME_CONDITION"] . '</td>
                <td>' . $row["GAME_WEEK"] . '</td>
                <td>' . $row["IMAGELINK"] . '</td>
                <td>' . $row["TIME"] . '</td>
                <td>' . $row["TEAM_SCORE"] . '</td>
                <td>' . $row["OPPONENT_SCORE"] . '</td>
                <td>' . $row["TEAM_SCORERS"] . '</td>
                <td>' . $row["OPPONENT_SCORERS"] . '</td>
                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["ID"] . ')">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}


function count_all_results($connect)
{
    $query = "SELECT * FROM results_table";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}


function fetch_top_five_data($connect)
{
	$query = "
	SELECT * FROM fans 
	ORDER BY id DESC 
";

	$result = $connect->query($query);

	$output = '';

	foreach($result as $row)
	{
		$output .= '
		
		<tr>
			<td>'.$row["USERNAME"].'</td>
            <td>'.$row["EMAIL"].'</td>
            <td>'.$row["PASSWORD"].'</td>
			<td>'.$row["FIRST_NAME"].'</td>
			<td>'.$row["LAST_NAME"].'</td>
            <td>'.$row["PHONE"].'</td>
			<td>'.$row["CURRENT_ADDRESS"].'</td>
			<td>'.$row["GENDER"].'</td>
            <td>'.$row["BIRTHDAY_DATE"].'</td>
			<td>'.$row["BIO"].'</td>

			<td><button type="button" onclick="fetch_data('.$row["ID"].')" class="btn btn-warning btn-sm">Edit</button>&nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="delete_data('.$row["ID"].')">Delete</button></td>
		</tr>
		';
	}
	return $output;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM fans";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}


function fetch_all_matches($connect)
{
    $query = "SELECT * FROM schedule_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
            <td>' . $row["OPPONENT_NAME"] . '</td>
            <td>' . $row["COMPETITION"] . '</td>
            <td>' . $row["DATE"] . '</td>
            <td>' . $row["STADIUM"] . '</td>
            <td>' . $row["GAME_CONDITION"] . '</td>
            <td>' . $row["GAME_WEEK"] . '</td>
            <td>' . $row["IMAGELINK"] . '</td>
            <td>' . $row["TIME"] . '</td>
                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["ID"] . ')">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}


function count_all_matches($connect)
{
    $query = "SELECT * FROM schedule_table";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function fetch_all_carpools($connect)
{
    $query = "SELECT * FROM carpool ORDER BY CARPOOL_ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
			<td>' . $row["DRIVER_ID"] . '</td>
			<td>' . $row["PASSENGER_ID"] . '</td>
			<td>' . $row["MATCH_ID"] . '</td>
			<td>' . $row["LOCATION"] . '</td>
			<td>' . $row["CAPACITY"] . '</td>
            <td>' . $row["AVAILABLE"] . '</td>
			<td>' . $row["PHONE"] . '</td>
                <td>
                    <button type="button" onclick="fetch_data(' . $row["CARPOOL_ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["CARPOOL_ID"] . ')">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}


function count_all_carpools($connect)
{
    $query = "SELECT * FROM carpool";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function fetch_all_gk($connect)
{
    $query = "SELECT * FROM goalkeepers_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
                <td>' . $row["PLAYERNAME"] . '</td>
                <td>' . $row["DATEOFBIRTH"] . '</td>
                <td>' . $row["NATIONALITY"] . '</td>
                <td>' . $row["EMAIL"] . '</td>
                <td>' . $row["INJURYHISTORY"] . '</td>
                <td>' . $row["ISINJURED"] . '</td>
                <td>' . $row["HEIGHT"] . '</td>
                <td>' . $row["WEIGHT"] . '</td>
                <td>' . $row["DIVING"] . '</td>
                <td>' . $row["HANDLING"] . '</td>
                <td>' . $row["KICKING"] . '</td>
                <td>' . $row["REFLEXES"] . '</td>
                <td>' . $row["SPEED"] . '</td>
                <td>' . $row["POSITIONING"] . '</td>
                <td>' . $row["COMMUNICATIONSKILLS"] . '</td>
                <td>' . $row["LEADERSHIPSKILLS"] . '</td>
                <td>' . $row["PAGELINK"] . '</td>
                <td>' . $row["IMAGELINK"] . '</td>
                <td>' . $row["SRCID"] . '</td>
                <td>' . $row["POSITION"] . '</td>
                <td>' . $row["PLAYERNUMBER"] . '</td>
                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["ID"] . ')">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}

function fetch_players_by_position($connect, $position)
{
    $query = "SELECT * FROM theplayers_table WHERE POSITION = :position";
    $statement = $connect->prepare($query);
    $statement->execute(['position' => $position]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $output = '';
    foreach ($result as $row) {
        $output .= '<tr>';
        $output .= '<td>' . $row["PLAYERNAME"] . '</td>';
        $output .= '<td>' . $row["DATEOFBIRTH"] . '</td>';
        $output .= '<td>' . $row["NATIONALITY"] . '</td>';
        $output .= '<td>' . $row["EMAIL"] . '</td>';
        $output .= '<td>' . $row["INJURYHISTORY"] . '</td>';
        $output .= '<td>' . $row["ISINJURED"] . '</td>';
        $output .= '<td>' . $row["HEIGHT"] . '</td>';
        $output .= '<td>' . $row["WEIGHT"] . '</td>';
        $output .= '<td>' . $row["PACE"] . '</td>';
        $output .= '<td>' . $row["SHOOTING"] . '</td>';
        $output .= '<td>' . $row["PASSING"] . '</td>';
        $output .= '<td>' . $row["DRIBBLING"] . '</td>';
        $output .= '<td>' . $row["DEFENDING"] . '</td>';
        $output .= '<td>' . $row["PHYSICALITY"] . '</td>';
        $output .= '<td>' . $row["HEADING"] . '</td>';
        $output .= '<td>' . $row["COMPOSURE"] . '</td>';
        $output .= '<td>' . $row["OTHERFAVORITEPOSITIONS"] . '</td>';
        $output .= '<td>' . $row["COMMUNICATIONSKILLS"] . '</td>';
        $output .= '<td>' . $row["LEADERSHIPSKILLS"] . '</td>';
        $output .= '<td>' . $row["IMAGELINK"] . '</td>';
        $output .= '<td>' . $row["POSITION"] . '</td>';
        $output .= '<td>' . $row["PLAYERNUMBER"] . '</td>';
        $output .= '<td>';
        $output .= '<button type="button" onclick="edit_player(' . $row["ID"] . ')">Edit</button>';
        $output .= '<button type="button" onclick="delete_player(' . $row["ID"] . ')">Delete</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
    return $output;
}

function fetch_all_products($connect)
{
    $query = "SELECT * FROM products_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
                <td>' . $row["PRODUCT_NAME"] . '</td>
                <td>' . $row["PRICE"] . '</td>
                <td>' . $row["AVAILABLE_QUANTITY"] . '</td>
                <td>' . $row["product_image"] . '</td>

                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" onclick="delete_data(' . $row["ID"] . ')" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}



function fetch_all_tickets($connect)
{
    $query = "SELECT * FROM tickets_table ORDER BY ID DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '
            <tr>
                <td>' . $row["ICON_LINK"] . '</td>
                <td>' . $row["OPPONENT"] . '</td>
                <td>' . $row["COMPETITION"] . '</td>
                <td>' . $row["STADIUM"] . '</td>
                <td>' . $row["AVAILABLE_QUANTITY"] . '</td>
                <td>' . $row["DATE"] . '</td>
                <td>' . $row["TIME"] . '</td>
                <td>' . $row["SCORE"] . '</td>

                <td>
                    <button type="button" onclick="fetch_data(' . $row["ID"] . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" onclick="delete_data(' . $row["ID"] . ')" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        ';
    }
    return $output;
}
function fetch_all_defenders($connect) {
    // Implement logic to fetch defender data from the database
    // Example:
    $query = "SELECT * FROM defenders"; // Modify this query according to your database structure
    $result = mysqli_query($connect, $query);
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td>{$row['ID']}</td>";
        $output .= "<td>{$row['PLAYERNAME']}</td>";
        $output .= "<td>{$row['DATEOFBIRTH']}</td>";
        $output .= "<td>{$row['NATIONALITY']}</td>";
        $output .= "<td>{$row['EMAIL']}</td>";
        $output .= "<td>{$row['INJURYHISTORY']}</td>";
        $output .= "<td>{$row['ISINJURED']}</td>";
        $output .= "<td>{$row['HEIGHT']}</td>";
        $output .= "<td>{$row['WEIGHT']}</td>";
        $output .= "<td>{$row['PACE']}</td>";
        $output .= "<td>{$row['SHOOTING']}</td>";
        $output .= "<td>{$row['PASSING']}</td>";
        $output .= "<td>{$row['DRIBBLING']}</td>";
        $output .= "<td>{$row['DEFENDING']}</td>";
        $output .= "<td>{$row['PHYSICALITY']}</td>";
        $output .= "<td>{$row['HEADING']}</td>";
        $output .= "<td>{$row['COMPOSURE']}</td>";
        $output .= "<td>{$row['OTHERFAVORITEPOSITIONS']}</td>";
        $output .= "<td>{$row['COMMUNICATIONSKILLS']}</td>";
        $output .= "<td>{$row['LEADERSHIPSKILLS']}</td>";
        $output .= "<td>{$row['IMAGELINK']}</td>";
        $output .= "<td>{$row['POSITION']}</td>";
        $output .= "<td>{$row['PLAYERNUMBER']}</td>";
        // Add more columns as needed
        $output .= "</tr>";
    }
    return $output;
}

function insert_player($player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number) {
    $conn = connect_to_database();

    $sql = "INSERT INTO players (player_name, date_of_birth, nationality, email, injury_history, is_injured, height, weight, pace, shooting, passing, dribbling, defending, physicality, heading, composure, other_favorite_positions, communication_skills, leadership_skills, image_link, position, player_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssss", $player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number);
    
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}

// Function to update a player in the database
function update_player($player_id, $player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number) {
    $conn = connect_to_database();

    $sql = "UPDATE players SET player_name=?, date_of_birth=?, nationality=?, email=?, injury_history=?, is_injured=?, height=?, weight=?, pace=?, shooting=?, passing=?, dribbling=?, defending=?, physicality=?, heading=?, composure=?, other_favorite_positions=?, communication_skills=?, leadership_skills=?, image_link=?, position=?, player_number=? WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssssssi", $player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number, $player_id);
    
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}

// Function to delete a player from the database
function delete_player($player_id) {
    $conn = connect_to_database();

    $sql = "DELETE FROM players WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $player_id);
    
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}


?>


