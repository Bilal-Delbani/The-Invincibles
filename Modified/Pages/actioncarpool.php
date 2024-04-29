<?php

// Include the database connection and any necessary functions
include('function.php');

// Check if the action parameter is set
if(isset($_POST["action"]))
{
    // Check the value of the action parameter to determine the operation
    if($_POST["action"] == "Add" || $_POST["action"] == "Update")
    {
        // Handle adding or updating a user record
        $output = array();
        
        // Retrieve data from the POST request
        $driver_id = $_POST["driver_id"];
        $passenger_id = $_POST["pass_id"];
        $match_id = $_POST["match_id"];
        $location = $_POST["location"];
        $capacity = $_POST["cap"];
        $available = $_POST["av"];
        $phone = $_POST["phone"];


        if($driver_id=="" || $passenger_id=="" || $match_id=="" || $location=="" || $capacity=="" || $available=="")
        {
            if($driver_id==""){
                $output["driver_id_error"] = "Please fill the Driver ID field...";
    
            }
            if($passenger_id==""){
                $output["pass_id_error"] = "Please fill the Passenger ID field...";
            }
            if($match_id==""){
                $output["match_id_error"] = "Please fill the Match ID field...";
            }
            if($location==""){
                $output["location_error"] = "Please fill the Location field...";
    
            }
            if($capacity==""){
                $output["cap_error"] = "Please fill the Capacity field...";
            }
            if($available==""){
                $output["av_error"] = "Please fill the Available field...";
            }
              
            echo json_encode($output);
        }
        else{
        // Perform necessary validation
        // (You can add validation code here)

        // Prepare data array
        $data = array(
            ':driver_id' => $driver_id,
            ':passenger_id' => $passenger_id,
            ':match_id' => $match_id,
            ':location' => $location,
            ':capacity' => $capacity,
            ':available' => $available,
            ':phone' => $phone
        );

        if($_POST["action"] == "Add")
        {
            $query = "INSERT INTO carpool (DRIVER_ID, PASSENGER_ID, MATCH_ID, LOCATION, CAPACITY, AVAILABLE, PHONE) 
            VALUES (:driver_id, :passenger_id, :match_id, :location, :capacity, :available, :phone)";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output["success"] = "<div class='alert alert-success'>New Carpool Added</div>";
            }
        }

        else if($_POST['action'] == 'Update')
        {
            $id=$_POST["customer_id"];
            // Execute the appropriate SQL query to update an existing user record
            $query = "UPDATE carpool 
                    SET DRIVER_ID = :driver_id, 
                    PASSENGER_ID = :passenger_id, 
                    MATCH_ID = :match_id, 
                    LOCATION = :location, 
                    CAPACITY = :capacity, 
                    AVAILABLE = :available, 
                    PHONE = :phone
                    WHERE CARPOOL_ID = '".$id."'";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output["success"] = "<div class='alert alert-success'>Carpool Updated</div>";
            }
        }

        echo json_encode($output);
        }

    }

    if($_POST['action'] == 'fetch')
    {
        $id=$_POST["id"];
        // Handle fetching user data
        $query = "SELECT * FROM carpool WHERE CARPOOL_ID = '".$id."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['driver_id'] = $row['DRIVER_ID'];
            $data['pass_id'] = $row['PASSENGER_ID'];
            $data['match_id'] = $row['MATCH_ID'];
            $data['location'] = $row['LOCATION'];
            $data['cap'] = $row['CAPACITY'];
            $data['av'] = $row['AVAILABLE'];
            $data['phone'] = $row['PHONE'];
        }

        echo json_encode($data);
    }

    if($_POST['action'] == 'delete')
    {
        // Handle deleting a user record
        $output = array();
        
        // Execute the SQL query to delete the user record
        $query = "DELETE FROM carpool WHERE CARPOOL_ID = '".$_POST["id"]."'";

        if($connect->query($query))
        {
            $output['success'] = '<div class="alert alert-success">Carpool Deleted</div>';
        }

        echo json_encode($output);
    }
}

?>
