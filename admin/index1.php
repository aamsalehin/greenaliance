<!DOCTYPE html>
<html>
<head>
	<title>Green Cities Alliance</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="images/182.png">
	<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel="stylesheet" type="text/css" href="../css/style3.css">
<script src="https://kit.fontawesome.com/72d02e7766.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="navbarNav" data-offset="70">

<?php
include('header.php');
?>
    <div class="container mt-5 bg-white signup-box table-product ">
        <h2>Areas</h2>
        <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='updated'){
                echo "<p class='added_message'> Area updated successfully!</p>";
                
              }
              if($message=='deleted'){
                echo "<p class='duplicate_message'>Deleted succesfully</p>";
              }
            }
            ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Area ID</th>
                    <th>Area Name</th>
                    <th>Actions</th>
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

                $sql = "SELECT areaId, name FROM areas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["areaId"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>
                            <a href='update_area.php?areaId=" . $row["areaId"] . "' class='btn btn-primary'>Update</a>
                            <a href='delete_area.php?areaId=" . $row["areaId"] . "' class='btn btn-danger'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No areas found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
<?php
include('../footer.php');
?>
