<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header("Location: ../userlogin.php"); 
    exit();
}
$buisnessId =$_SESSION['businessId'];

?>
<?php
include('header.php');
?>
    <div class="container mt-5 bg-white signup-box p-3">
        <h2>All Products Details</h2>
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Product Name</th>
                   
                    <th>Price</th>
                    <th>Size</th>
                    <th>Pricing</th>
                    <th>Description</th>
                    <th>Benefits</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
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

                // $sql = "SELECT * FROM business_products bp where bp.businessId=$buisnessId
                // 	JOIN products p ON bp.productId = p.productId";
                $sql = "SELECT * FROM business_products bp 
                JOIN products p ON bp.productId = p.productId where bp.businessId=$buisnessId;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        
                        echo "<td>" . htmlspecialchars($row["productName"]) . "</td>";
                        
                        echo "<td>$" . number_format($row["price"], 2) . "</td>";
                        echo "<td>" . htmlspecialchars($row["size"]) . "</td>";
                        echo "<td>" . $row["pricing"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["environmentalBenefits"]) . "</td>";
                        echo "<td><a href='update_product.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a>
                                  <a href='delete_product.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a></td>";
                        echo "</tr>";
                        
                    }
                } else {
                    echo "<tr><td colspan='8'>No products found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
<?php
include('../footer.php');
?>
