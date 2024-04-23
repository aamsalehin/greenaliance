<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape the user input to prevent SQL injection
$productName = $conn->real_escape_string($_POST['productName']);

// SQL query to check if the product name already exists
$sql = "SELECT productId FROM products WHERE productName = '$productName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Duplicate entry found, redirect or handle as needed
    header("Location: addproduct.php?result=duplicate");
    exit();
} else {
    // No duplicate found, proceed to insert new data
    $sqlInsert = "INSERT INTO products (productName) VALUES ('$productName')";
    if ($conn->query($sqlInsert) === TRUE) {
        header("Location: addproduct.php?result=added");
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
