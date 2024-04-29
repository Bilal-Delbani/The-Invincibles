<?php
include('function.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("location:../index.html");
    exit(); // Stop further execution
}

// Handle Add Operation
if ($_POST['action'] == 'Add') {
    // Validate form data
    $player_name = $_POST['PLAYERNAME'];
    $date_of_birth = $_POST['DATEOFBIRTH'];
    $nationality = $_POST['NATIONALITY'];
    $email = $_POST['EMAIL'];
    $injury_history = $_POST['INJURYHISTORY'];
    $is_injured = $_POST['ISINJURED'];
    $height = $_POST['HEIGHT'];
    $weight = $_POST['WEIGHT'];
    $pace = $_POST['PACE'];
    $shooting = $_POST['SHOOTING'];
    $passing = $_POST['PASSING'];
    $dribbling = $_POST['DRIBBLING'];
    $defending = $_POST['DEFENDING'];
    $physicality = $_POST['PHYSICALITY'];
    $heading = $_POST['HEADING'];
    $composure = $_POST['COMPOSURE'];
    $other_favorite_positions = $_POST['OTHERFAVORITEPOSITIONS'];
    $communication_skills = $_POST['COMMUNICATIONSKILLS'];
    $leadership_skills = $_POST['LEADERSHIPSKILLS'];
    $image_link = $_POST['IMAGELINK'];
    $position = $_POST['POSITION'];
    $player_number = $_POST['PLAYERNUMBER'];

    // Insert player into the database
    $result = insert_player($player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number);

    if ($result) {
        echo json_encode(array('success' => 'Player added successfully.'));
    } else {
        echo json_encode(array('error' => 'Failed to add player.'));
    }
}

// Handle Edit Operation
if ($_POST['action'] == 'Update') {
    // Validate form data
    $player_id = $_POST['customer_id'];
    $player_name = $_POST['PLAYERNAME'];
    $date_of_birth = $_POST['DATEOFBIRTH'];
    $nationality = $_POST['NATIONALITY'];
    $email = $_POST['EMAIL'];
    $injury_history = $_POST['INJURYHISTORY'];
    $is_injured = $_POST['ISINJURED'];
    $height = $_POST['HEIGHT'];
    $weight = $_POST['WEIGHT'];
    $pace = $_POST['PACE'];
    $shooting = $_POST['SHOOTING'];
    $passing = $_POST['PASSING'];
    $dribbling = $_POST['DRIBBLING'];
    $defending = $_POST['DEFENDING'];
    $physicality = $_POST['PHYSICALITY'];
    $heading = $_POST['HEADING'];
    $composure = $_POST['COMPOSURE'];
    $other_favorite_positions = $_POST['OTHERFAVORITEPOSITIONS'];
    $communication_skills = $_POST['COMMUNICATIONSKILLS'];
    $leadership_skills = $_POST['LEADERSHIPSKILLS'];
    $image_link = $_POST['IMAGELINK'];
    $position = $_POST['POSITION'];
    $player_number = $_POST['PLAYERNUMBER'];

    // Update player in the database
    $result = update_player($player_id, $player_name, $date_of_birth, $nationality, $email, $injury_history, $is_injured, $height, $weight, $pace, $shooting, $passing, $dribbling, $defending, $physicality, $heading, $composure, $other_favorite_positions, $communication_skills, $leadership_skills, $image_link, $position, $player_number);

    if ($result) {
        echo json_encode(array('success' => 'Player updated successfully.'));
    } else {
        echo json_encode(array('error' => 'Failed to update player.'));
    }
}

// Handle Delete Operation
if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];

    // Delete player from the database
    $result = delete_player($id);

    if ($result) {
        echo json_encode(array('success' => 'Player deleted successfully.'));
    } else {
        echo json_encode(array('error' => 'Failed to delete player.'));
    }
}

// Handle other cases or errors
?>
