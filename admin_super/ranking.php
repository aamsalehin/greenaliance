<?php
session_start();
if (!isset($_SESSION['email'])=='admin@admin.com') {
    header("Location:userlog.php"); 
    exit();
}
include('header.php');
?>
    <div class="container signup-box bg-white p-3">
        <h4 class="text-green">Product Vote Results</h4>
        <table class="table table-striped rounded">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Business Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Total Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "greencity";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT p.category, bp.price,  p.productName, b.businessName, ROUND(COUNT(v.vote)/2)  AS totalVotes
                        FROM product_votes v
                        JOIN products p ON v.productId = p.productId
                        JOIN businesses b ON v.businessId = b.businessId
                        JOIN business_products bp ON bp.businessId=b.businessId
                        WHERE v.vote = 1
                        GROUP BY v.businessId, v.productId
                        ORDER BY totalVotes DESC";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['businessName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                        echo "<td>$" . number_format($row["price"],0) . "</td>";
                        echo "<td>" . $row['totalVotes'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No votes found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
<?php
include('../footer.php');
?>