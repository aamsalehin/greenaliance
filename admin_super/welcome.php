<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

echo "Welcome, you are logged in!";
// Add more functionality or HTML as needed
?>
