<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header("Location: userlogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO business_products (businessId, productId, price, size, pricing, description, environmentalBenefits) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisdsss", $_SESSION['businessId'], $productId, $price, $size, $pricing, $description, $environmentalBenefits);

// Set parameters and execute
$productId = $_POST['productId'];
$price = $_POST['price'];
$size = $_POST['size'];
$pricing = $_POST['pricing'];
$description = $_POST['description'];
$environmentalBenefits = $_POST['environmentalBenefits'];

if ($stmt->execute()) {
    header("Location:productdetails.php?result=added");
} else {
    $Error= $stmt->error;
    header("Location:productdetails.php?result=".$Error);
}

$stmt->close();
$conn->close();
?>
