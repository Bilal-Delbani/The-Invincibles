<?php

function VarExist($var){
   if (isset($var)){
       return $var;
   } else {
       header("location:../index.html");
   }
}

$user = new stdClass();
$user->username = VarExist($_POST["username"]);
$user->email = VarExist($_POST["email"]);
$user->password = VarExist($_POST["password"]);
$user->confirmPassword = VarExist($_POST["confirmPassword"]);
$user->gender = VarExist($_POST["options"]);

// Function to validate password
function validatePassword($password) {
    // Regular expressions for different character types
    $uppercaseRegex = '/[A-Z]/';
    $lowercaseRegex = '/[a-z]/';
    $numberRegex = '/[0-9]/';
    $specialCharRegex = '/[!@#$%^&*()_+\-=\[\]{};\'\\:"|,.<>\/?]/';

    // Check if the password meets all criteria
    return strlen($password) >= 8 &&
           preg_match($uppercaseRegex, $password) &&
           preg_match($lowercaseRegex, $password) &&
           preg_match($numberRegex, $password) &&
           preg_match($specialCharRegex, $password);
}

if ($user->password == $user->confirmPassword && validatePassword($user->password)) {
    // Database connection details from the original backend file
    $dbhost = "localhost";
    $dbname = "football_club";
    $dbuser = "root";
    $dbpass = ""; // Please fill in your database password if it's not empty

    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    if (strpos($user->email, '.admin')) {
        $query = "SELECT COUNT(*) FROM managers WHERE EMAIL = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<script>
                    alert('Email: " . $user->email . " already exists!');
                    window.location.replace('../index.html');
                  </script>";
        } else {
            // Insert new user
            $query = "INSERT INTO managers (`USERNAME`, `PASSWORD`, `EMAIL`, `GENDER`) 
                      VALUES (:username, :password, :email, :gender)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $user->username);
            $stmt->bindParam(':password', password_hash($user->password, PASSWORD_DEFAULT));
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':gender', $user->gender);

            $stmt->execute();

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                session_set_cookie_params(3600);
            }
            $_SESSION["LAST_ACTIVITY"] = time(); // Add this line to update LAST_ACTIVITY
            $_SESSION["username"] = $user->username;
            $_SESSION["password"] = $user->password;
            $_SESSION["email"] = $user->email;
            header("location:../Pages/manager.php");
            echo "<script>alert('Manager registration successful!');</script>";
        }
    } else {
        // Check if email already exists
        $query = "SELECT COUNT(*) FROM fans WHERE EMAIL = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<script>
                    alert('Email: " . $user->email . " already exists!');
                    window.location.replace('../index.html');
                  </script>";
        } else {
            // Proceed with user registration since email is unique
            // Insert new user
            $query = "INSERT INTO fans (`USERNAME`, `PASSWORD`, `EMAIL`, `GENDER`) 
                      VALUES (:username, :password, :email, :gender)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $user->username);
            $stmt->bindParam(':password', password_hash($user->password, PASSWORD_DEFAULT));
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':gender', $user->gender);

            $stmt->execute();

            // Handle session and redirection
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                session_set_cookie_params(3600);
            }
            $_SESSION["LAST_ACTIVITY"] = time(); // Update LAST_ACTIVITY
            $_SESSION["username"] = $user->username;
            $_SESSION["password"] = $user->password;
            $_SESSION["email"] = $user->email;
            header("location:../Pages/home.php");
            echo "<script>alert('User registration successful!');</script>";
        }
    }
} else {
    ?>          
    <script>
        alert('Password is either does not match or does not meet the criteria, it should contain at least 8 characters, 1 special character, number, small and capital letters');
        window.location.replace("../index.html");
    </script>
<?php
}
?>
