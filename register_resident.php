<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'greencity');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collecting data from the form
$firstName = $conn->real_escape_string($_POST['firstName']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$email = $conn->real_escape_string($_POST['email']);
$mobile = $conn->real_escape_string($_POST['mobile']);
$ageGroup = $conn->real_escape_string($_POST['ageGroup']);
$gender = $conn->real_escape_string($_POST['gender']);
$location = $conn->real_escape_string($_POST['location']);
$interests = isset($_POST['interests']) ? join(',', $_POST['interests']) : '';
$password = $conn->real_escape_string($_POST['password']);
$confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);
//check gender 

// Validate gender input
$allowedGenders = ['Male', 'Female', 'Other'];
if (!in_array($gender, $allowedGenders)) {
    die('Invalid gender value.');
}

// Check if passwords match
if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
    exit();
}

// Hashing the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SQL to insert new resident
$sql = "INSERT INTO residents (firstName, lastName, email, mobile, ageGroup, gender, location, interests, password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssisss", $firstName, $lastName, $email, $mobile, $ageGroup, $gender, $location, $interests, $hashedPassword);

if ($stmt->execute()) {
    header("Location:registration.php?result=added");
} else {
    $err= $stmt->error;
    header("Location:registration.php?result=duplicate");
}

$stmt->close();
$conn->close();
?>