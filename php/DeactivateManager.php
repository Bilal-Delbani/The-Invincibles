<?php
session_start();
include('../Pages/function.php');

// Check if email is set in session
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    // Establish a database connection
    $query = "DELETE FROM managers WHERE EMAIL = :email";
    $statement = $connect->prepare($query);
    
    // Bind the parameter
    $statement->bindParam(':email', $email);

    if($statement->execute()) {
        // Check if any row was affected (deleted)
        if($statement->rowCount() > 0) {
            // Redirect to index.html if deletion is successful
            header("location: ../index.html");
            exit; // Stop script execution after redirection
        } else {
            echo "No record was deleted."; // Handle case when no record is deleted
        }
    } 
    else {
        echo "Error executing query: " . $statement->errorInfo()[2]; // Handle query execution error
    }

    // Close statement
    $statement->closeCursor(); // Close cursor instead of closing the statement
} else {
    echo "Email not set in session."; // Handle case when email is not set in session
}
?>
