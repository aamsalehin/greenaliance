<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header("Location: ../userlogin.php"); // Redirect to login page if not logged in
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

// Fetch products for the select dropdown
$sql = "SELECT productId, productName FROM products";
$result = $conn->query($sql);
?>


   <?php
    include('header.php');
   ?>
    <div class="container signup-box ">
        <h2 class="text-white">Add  Product</h2>
        <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='added'){
                echo "<p class='added_message'>Added Succesfully!</p>";
              }
              else{
                echo "<p class='duplicate_message'>Already added or something wrong</p>";
              }
            }
            ?>
        <form action="submit_product.php" method="POST">
            <div class="form-group">
                <label for="productId">Select Product:</label>
                <select class="form-control" id="productId" name="productId">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['productId'] . '">' . $row['productName'] . '</option>';
                        }
                    } else {
                        echo '<option>No products available</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Product Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" name="size" required>
            </div>
            <div class="form-group">
                <label for="pricing">Pricing:</label>
                <select class="form-control" id="pricing" name="pricing">
                    <option value="Affordable">Affordable</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="environmentalBenefits">Environmental Benefits:</label>
                <textarea class="form-control" id="environmentalBenefits" name="environmentalBenefits" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
<?php
include('../footer.php');
?>
<?php $conn->close(); ?>
