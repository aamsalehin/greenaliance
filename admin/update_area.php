<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$areaId = $_GET['areaId'] ?? '';  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "UPDATE areas SET name = ? WHERE areaId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $areaId);
    if ($stmt->execute()) {
        header("Location: index.php?result=updated");
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
} else {
    
    $sql = "SELECT name FROM areas WHERE areaId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $areaId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Area</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Area</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Area Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
