<?php
session_start();

$servername = "localhost";
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "greencity"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];

// Prepare SQL to fetch the user
$sql = "SELECT residentId, password FROM residents WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Authentication successful
        $_SESSION['residentId'] = $row['residentId']; // Store session data
        header("Location: index.php"); // Redirect to index.php
        exit();
    } else {
        // Authentication failed
        header("Location:userlogin.php?result=wrongres");
    }
} else {
    header("Location:userlogin.php?result=notfound");
}

$stmt->close();
$conn->close();
?>
