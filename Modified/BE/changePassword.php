<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dbhost="127.0.0.1";
$dbname="mpm_db";
$dbuser="root";
$dbpass="mpmdb";
$db=null;
try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);        
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
session_start();
$username=$_POST["username"];
$newPassword=$_POST["newPassword"];
$confirmNewPassword=$_POST["confirmNewPassword"];
if (isset($_SESSION["password"])) {
   $oldPassword = $_SESSION["password"];
}
//instantiation and passing true enable exceptions
$mail = new PHPMailer(true);
try{
    $mail ->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username = 'yaakoubhamad2003@gmail.com';
    $mail->Password = 'nothingbutpass12';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;



}


$query = "SELECT password FROM users WHERE username = :username";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $_POST["username"]);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$hashed_Password_From_DB = $user['password'];
if ($user && !password_verify($oldPassword, $hashed_Password_From_DB) && ($newPassword==$confirmNewPassword) && ($oldPassword!=$newPassword)){
   $query = "UPDATE users SET password = :newPassword WHERE username = :username AND password = :hashed_Password_From_DB";
   $stmt = $db->prepare($query);
   $stmt->bindParam(':username', $username);
   $stmt->bindValue(':newPassword',password_hash($newPassword,PASSWORD_DEFAULT));
   $stmt->bindParam(':hashed_Password_From_DB', $hashed_Password_From_DB);
   $stmt->execute();
   $rowCount = $stmt->rowCount();
   if ($rowCount > 0) {
       echo "Password updated successfully.";
   } else {
       echo "Password update failed.";
   }   
}
else{
   // don't update
   echo "fail!";
}
?>
