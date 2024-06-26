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
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://kit.fontawesome.com/72d02e7766.js" crossorigin="anonymous"></script>
<style>
   
</style>
</head>
<body class="b-image" data-spy="scroll" data-target="navbarNav" data-offset="70">
    <?php
    include('header.php');
    ?>
   <div class="t-150">
   <div class="container  mt-4">
      
            <h4 class="text-white text-center pb-3">Vote Any Products or services <i class=" text-green fa-solid fa-thumbs-up"></i></h4>
       
        <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='done'){
                echo "<p class='added_message'>Vote done!</p>";
              }
              if($message=='alreadydone'){
                echo "<p class='duplicate_message'>Already voted once!</p>";
              }
              
            }
            ?>
        <div class="row services">
            <?php
            session_start();
            if (!isset($_SESSION['residentId'])) {
                header('Location: userlogin.php'); // Redirect to login if not logged in
                exit();
            }
            $residentId = $_SESSION['residentId'];

            $conn = new mysqli('localhost', 'root', '', 'greencity');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // $sql = "SELECT b.buisnessName, p.productId, p.productName, bp.price, bp.pricing, bp.description, bp.environmentalBenefits
            //         FROM business_products bp
            //         JOIN products p ON bp.productId = p.productId
            //         JOIN businesses b ON bp.businessId = b.businessId";



// 
$sql = "SELECT b.businessId, b.businessName, p.productId, p.productName, bp.price, bp.pricing, bp.description, bp.environmentalBenefits
				FROM business_products bp
				JOIN products p ON bp.productId = p.productId
				JOIN businesses b ON bp.businessId = b.businessId";
// 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo	'<div class="col-lg-4 col-md-6 col-sm-12 py-15">';	
					echo '<div class="services_box box">';
					echo '<div class="text">';
					echo '<h4 class="box_title mb-20">'. htmlspecialchars($row["productName"]) .'</h4>';
					echo '<h6><b>Company: </b>'. htmlspecialchars($row["businessName"]) .'</h6>';
					echo '<p class="mt-2 pt-0 mb-0 pb-0"> <b>Description: </b>'. htmlspecialchars($row["description"]) .'</p>';
                    echo '<p class="pricing"><b></b> ' . $row["pricing"] . '</p>';
                    echo '<p class="mt-0 pt-0 mb-0 pb-0"> <b>Benefits: </b>' . htmlspecialchars($row["environmentalBenefits"]) . '</p>';
					echo '<p class="mt-2 mb-0 pb-0">  $<b>' . number_format($row["price"], 0) . '</b></p>';
					
					echo '<form action="submit_vote.php" method="post">';
                    echo '<input type="hidden" name="productId" value="' . $row["productId"] . '">';
                    echo '<input type="hidden" name="residentId" value="' . $residentId . '">';
                    echo '<input type="hidden" name="businessId" value="' . $row["businessId"] . '">';
                    echo '<p class="text-center text-green  mt-2 mb-0 pb-0">Did you find this product beneficial?</p>';
                    echo '<div class="text-center mt-0 pt-0 mb-0 pt-0">';
                    echo '<button type="submit" name="vote" value="1" class="btn mt-0 pt-0 btn-cs btn-success"><i class=" text-success  fa-solid fa-thumbs-up"></i></button>';
                    echo '<button type="submit" name="vote" value="0" class="btn mt-0 pt-0  btn-cs btn-danger"><i class=" text-danger  fa-solid fa-thumbs-down"></i></button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>
   </div>
<?php
include('footer.php');
?>
