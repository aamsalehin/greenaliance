<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT areaId, name FROM areas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["areaId"] . "'>" . $row["name"] . "</option>";
    }
} else {
    echo "<option>No areas available</option>";
}
$conn->close();
?>
