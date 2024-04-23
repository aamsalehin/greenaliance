<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header('Location: login.php'); // Redirect to login if not logged in
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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $pricing = $_POST['pricing'];
    $description = $_POST['description'];
    $environmentalBenefits = $_POST['environmentalBenefits'];

    $sql = "UPDATE business_products SET price=?, size=?, pricing=?, description=?, environmentalBenefits=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dssssi", $price, $size, $pricing, $description, $environmentalBenefits, $id);

    if ($stmt->execute()) {
        // echo "<script>alert('Product updated successfully');window.location.href='/project/admin';</script>";
        header("Location:index.php?result=updated");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Fetch the existing product for the given id to populate the form
    $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Product ID not specified.');
    $sql = "SELECT * FROM business_products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        die('Error: Product not found.');
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Product</h2>
        <form action="update_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" name="size" value="<?php echo htmlspecialchars($row['size']); ?>" required>
            </div>
            <div class="form-group">
                <label for="pricing">Pricing:</label>
                <select class="form-control" name="pricing">
                    <option <?php echo $row['pricing'] == 'Affordable' ? 'selected' : ''; ?> value="Affordable">Affordable</option>
                    <option <?php echo $row['pricing'] == 'Moderate' ? 'selected' : ''; ?> value="Moderate">Moderate</option>
                    <option <?php echo $row['pricing'] == 'Premium' ? 'selected' : ''; ?> value="Premium">Premium</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="environmentalBenefits">Environmental Benefits:</label>
                <textarea class="form-control" name="environmentalBenefits" required><?php echo htmlspecialchars($row['environmentalBenefits']); ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>

