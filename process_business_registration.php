<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greencity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$businessName = $conn->real_escape_string($_POST['businessName']);
$contactPerson = $conn->real_escape_string($_POST['contactPerson']);
$email = $conn->real_escape_string($_POST['email']);
$mobile = $conn->real_escape_string($_POST['mobile']);
$address1 = $conn->real_escape_string($_POST['address1']);
$address2 = $conn->real_escape_string($_POST['address2']);
$area = $conn->real_escape_string($_POST['area']);
$password = $conn->real_escape_string($_POST['password']);
$confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
    exit();
}

// Check for duplicate business name
$checkSql = "SELECT businessId FROM businesses WHERE businessName = '$businessName' or email='$email'";
$result = $conn->query($checkSql);
if ($result->num_rows > 0) {
    // Redirect back to form with error message
    header("Location: buisnessreg.php?result=duplicate");
    exit();
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO businesses (businessName, contactPerson, email, mobile, address1, address2, areaId, password) VALUES ('$businessName', '$contactPerson', '$email', '$mobile', '$address1', '$address2', '$area', '$passwordHash')";

if ($conn->query($sql) === TRUE) {
    header("Location: buisnessreg.php?result=added");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
