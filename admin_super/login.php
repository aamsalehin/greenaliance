<?php
session_start(); 
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION["email"]="admin@admin.com";

    if ($email=="admin@admin.com" && $password=="admin") {
      $_SESSION["email"]="admin@admin.com";
      header("Location: index.php");
        exit();
    } else {
        header("Location: userlog.php?result=invalid");
    }
?>
