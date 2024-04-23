<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $areaName = $conn->real_escape_string($_POST['areaName']);

    // SQL to insert a new area
    $sql = "INSERT INTO areas (name) VALUES (?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $areaName);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            header("Location:addarea.php?result=added");
        } else {
            if ($conn->errno == 1062) {
                header("Location:addarea.php?result=duplicate");
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
