<?php
session_start();

$dbhost = "localhost";
$dbname = "football_club";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];



if(strpos($email,'.admin')){
    $query = "SELECT ID, PASSWORD FROM managers WHERE USERNAME = :username";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['PASSWORD'])) {
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $user['ID']; // Set the 'id' key in session
        $_SESSION["email"] = $email;
    
    ?>
    <script>
        alert("<?php echo "You're in! Manager $username." ?>");
        window.location.replace("../Pages/manager.php");
    </script>
    <?php
    }
    else{
        ?>
    <script>
        alert("<?php echo "We couldn't log you in. Please check your credentials and try again.." ?>");
        window.location.replace("../FE/Login-Form/LoginPage.php");
    </script>
    <?php
    }
    
}

else{
    $query = "SELECT ID, PASSWORD FROM fans WHERE USERNAME = :username ";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['PASSWORD'])) {
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $user['ID']; // Set the 'id' key in session
        $_SESSION["email"] = $email;
    
    
        ?>
        <script>
            alert("<?php echo "You're in! Enjoy your time on our platform, $username." ?>");
            window.location.replace("../Pages/home.php");
        </script>
    <?php
        }
    else{
        ?>
    <script>
        alert("<?php echo "We couldn't log you in. Please check your credentials and try again.." ?>");
        window.location.replace("../FE/Login-Form/LoginPage.php");
    </script>
    <?php
    }

} 
?>
