<?php
session_start();
if (!isset($_SESSION['email'])=='admin@admin.com') {
    header("Location:userlog.php"); 
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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM business_products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
