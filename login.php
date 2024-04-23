<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];

$sql = "SELECT businessId, password FROM businesses WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['businessId'] = $row['businessId'];
        header("Location: ./admin");
        exit();
    } else {
        header("Location:userlogin.php?result=wrong");
    }
} else {
    header("Location:userlogin.php?result=nouser");
}

$conn->close();
?>
