<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if (isset($_GET['areaId'])) {
//     $areaId = $_GET['areaId'];

//     $sql = "DELETE FROM areas WHERE areaId = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("i", $areaId);

//     if ($stmt->execute()) {
//         header("Location: index.php");
//     } else {
//         echo "Error deleting record: " . $conn->error;
//     }

//     $stmt->close();
// }
// $conn->close();
//



$areaId = $_GET['areaId'];  // or however you get the areaId
// Check if any businesses use this areaId
$query = "SELECT COUNT(*) AS count FROM businesses WHERE areaId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $areaId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    echo "Cannot delete the area because it is still referenced by businesses.";
} else {
    // Safe to delete
    $query = "DELETE FROM areas WHERE areaId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $areaId);
    $stmt->execute();
    header("Location:index.php?result=deleted");
}
?>