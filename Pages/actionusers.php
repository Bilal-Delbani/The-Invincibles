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
        $username = $_POST["user_name"];
        $password = $_POST["pass"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone = $_POST["phone"];
        //$points = $_POST["points"];
        $current_address = $_POST["addr"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $birthday_date = $_POST["bday"];
        $bio = $_POST["bio"];

        if($username=="" || $password=="" || $email==""){
            if($username==""){
                $output["user_name_error"] = "Please fill the User Name field...";
    
            }
            if($password==""){
                $output["password_error"] = "Please fill the Password field...";
            }
            if($email==""){
                $output["email_error"] = "Please fill the Email field...";
            }        
            echo json_encode($output);
        }
        else{
        // Perform necessary validation
        // (You can add validation code here)

        // Prepare data array
        $data = array(
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            //':points' => $points,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':phone' => $phone,
            ':current_address' => $current_address,
            ':gender' => $gender,
            ':email' => $email,
            ':birthday_date' => $birthday_date,
            ':bio' => $bio
        );

        if($_POST["action"] == "Add")
        {
            // Execute the appropriate SQL query to insert a new user record
            $query = "INSERT INTO fans (USERNAME, PASSWORD, FIRST_NAME, LAST_NAME, PHONE, CURRENT_ADDRESS, GENDER, EMAIL, BIRTHDAY_DATE, BIO) 
                      VALUES (:username, :password, :first_name, :last_name, :phone, :current_address, :gender, :email, :birthday_date, :bio)";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output["success"] = "<div class='alert alert-success'>New User Added</div>";
            }
        }

        else if($_POST['action'] == 'Update')
        {
            $id=$_POST["customer_id"];
            // Execute the appropriate SQL query to update an existing user record
            $query = "UPDATE fans 
                      SET USERNAME = :username, 
                          PASSWORD = :password, 
                          FIRST_NAME = :first_name, 
                          LAST_NAME = :last_name, 
                          PHONE = :phone, 
                          CURRENT_ADDRESS = :current_address, 
                          GENDER = :gender, 
                          EMAIL = :email, 
                          BIRTHDAY_DATE = :birthday_date, 
                          BIO = :bio 
                      WHERE ID = '".$id."'";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output["success"] = "<div class='alert alert-success'>User Updated</div>";
            }
        }

        echo json_encode($output);
        }

    }

    if($_POST['action'] == 'fetch')
    {
        $id=$_POST["id"];
        // Handle fetching user data
        $query = "SELECT * FROM fans WHERE ID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['username'] = $row['USERNAME'];
            $data['password'] = $row['PASSWORD'];
            //$data['points'] = $row['POINTS'];
            $data['first_name'] = $row['FIRST_NAME'];
            $data['last_name'] = $row['LAST_NAME'];
            $data['phone'] = $row['PHONE'];
            $data['address'] = $row['CURRENT_ADDRESS'];
            $data['gender'] = $row['GENDER'];
            $data['email'] = $row['EMAIL'];
            $data['birthday_date'] = $row['BIRTHDAY_DATE'];
            $data['bio'] = $row['BIO'];
        }

        echo json_encode($data);
    }

    if($_POST['action'] == 'delete')
    {
        // Handle deleting a user record
        $output = array();
        
        // Execute the SQL query to delete the user record
        $query = "DELETE FROM fans WHERE ID = '".$_POST["id"]."'";

        if($connect->query($query))
        {
            $output['success'] = '<div class="alert alert-success">User Deleted</div>';
        }

        echo json_encode($output);
    }
}

?>
