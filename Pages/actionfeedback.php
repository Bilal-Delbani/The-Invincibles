<?php

// Include the database connection and any necessary functions
include('function.php');

// Check if the action parameter is set
if(isset($_POST["action"]))
{

    if($_POST['action'] == 'delete')
    {
        // Handle deleting a user record
        $output = array();
        
        // Execute the SQL query to delete the user record
        $query = "DELETE FROM feedback WHERE FAN_ID = '".$_POST["id"]."'";

        if($connect->query($query))
        {
            $output['success'] = '<div class="alert alert-success">Feedback Deleted</div>';
        }

        echo json_encode($output);
    }
}

?>
