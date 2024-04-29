<?php

$dbhost = "127.0.0.1";
$dbname = "football_club";
$dbuser = "root";
$dbpass = "";
$db = null;
try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
die();
}
session_start();
$username = $_POST["username"];
$newPassword = $_POST["newPassword"];
$confirmNewPassword = $_POST["confirmNewPassword"];
if (isset($_SESSION["password"])) {
    $oldPassword = $_SESSION["password"];
}

$query = "SELECT PASSWORD FROM fans WHERE USERNAME = :username";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $_POST["username"]);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user !== false) {
    
    $hashed_Password_From_DB = $user['PASSWORD'];
    if (($newPassword == $confirmNewPassword) && ($oldPassword != $newPassword)) {
       
        $query = "UPDATE fans SET PASSWORD = :newPassword WHERE USERNAME = :username AND PASSWORD = :hashed_Password_From_DB";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindValue(':newPassword', password_hash($newPassword, PASSWORD_DEFAULT));
        $stmt->bindParam(':hashed_Password_From_DB', $hashed_Password_From_DB);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        
        if ($rowCount > 0) {
?>          
            <script>
                alert("<?php echo "your password has been succesful reset" ?>");
                window.location.replace("../FE/Login-Form/LoginPage.php");
            </script>
            
<?php
        } else {
            echo "Password update failed.";
        }
    }
}

?>