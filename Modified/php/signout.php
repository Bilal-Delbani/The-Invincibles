<?php
session_start();
session_unset();
session_destroy();
header("Location: ../FE/Login-Form/LoginPage.php"); // redirect to login page
exit();
?>
