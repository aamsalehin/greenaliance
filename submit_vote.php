<?php
session_start();
if (!isset($_SESSION['residentId'])) {
    header('Location: userlogin.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'greencity');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$residentId = $_POST['residentId'];
$productId = $_POST['productId'];
$vote = $_POST['vote'];
$businessId=$_POST['businessId'];

// Check if the user has already voted
$checkSql = "SELECT voteId FROM product_votes WHERE residentId = ? AND productId = ? AND businessId = ?";
$stmt = $conn->prepare($checkSql);
$stmt->bind_param("iii", $residentId, $productId, $businessId);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("location:voting.php?result=alreadydone");
} else {
    $stmt->close();
    // Insert the vote
    $insertSql = "INSERT INTO product_votes (productId, residentId, businessId, vote) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("iiii", $productId, $residentId, $businessId, $vote);
    if ($stmt->execute()) {
        header("location:voting.php?result=done");
    } else {
        header("location:voting.php?result=error");
    }
}
$stmt->close();
$conn->close();
?>
