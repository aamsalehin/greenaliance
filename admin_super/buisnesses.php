<?php
session_start();
if (!isset($_SESSION['email'])=='admin@admin.com') {
    header("Location:userlog.php"); 
    exit();
}
include('header.php');
?>
    <div class="container mt-5 bg-white signup-box p-3">
        <h2>All Products Details</h2>
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Buisness Name</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Area</th>
                    
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
                $sql = "SELECT * FROM businesses b JOIN areas a ON b.areaId = a.areaId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        
                        echo "<td>" . htmlspecialchars($row["businessName"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["contactPerson"]) . "</td>";
                        
                       
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        
                        echo "<td>" . htmlspecialchars($row["mobile"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        
                        // echo "<td><a href='update_buisness.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a>
                                //  <a href='delete_product.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a></td>";
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





