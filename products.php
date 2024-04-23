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
</head>
<body class="b-image" data-spy="scroll" data-target="navbarNav" data-offset="70">

<?php include "header.php";?>

<section id="services" class="services t-150">
<div class="text-white container text-center">
        
        <form action="search.php" method="get">
            <div class="form-group ">
                
                <input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Enter product or service name">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="priceFilter" name="priceFilter">
                <label class="form-check-label" for="priceFilter">Show products below $200</label>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
	<div class="container">
		<div class="row">
			<div class="section_title mb-2 text-center">
				<p class="mt-3">What Does Green Cities Allience Offer?</p>
				<!-- <h3 class="text-white">products & Services</h3> -->
			</div>

			<?php
            // $servername = "localhost";
            // $username = "root";
            // $password = "";
            // $dbname = "greencity";

            // $conn = new mysqli($servername, $username, $password, $dbname);
            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // }

            // $sql = "SELECT p.productName, b.businessName, bp.price, bp.pricing, bp.description, bp.environmentalBenefits
            //         FROM business_products bp
            //         JOIN products p ON bp.productId = p.productId
            //         JOIN businesses b ON bp.businessId = b.businessId";
            // $result = $conn->query($sql);



		$conn = new mysqli('localhost', 'root', '', 'greencity');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT b.businessName, p.productId, p.productName, bp.price, bp.pricing, bp.description, bp.environmentalBenefits
				FROM business_products bp
				JOIN products p ON bp.productId = p.productId
				JOIN businesses b ON bp.businessId = b.businessId";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
					echo	'<div class="col-lg-4 col-md-6 col-sm-12 py-15">';	
					echo '<div class="services_box box">';
					echo '<div class="text">';
					echo '<h4 class="box_title mb-20">'. htmlspecialchars($row["productName"]) .'</h4>';
					echo '<h6><b>Company: </b>'. htmlspecialchars($row["businessName"]) .'</h6>';
					echo '<p> <b>Description: </b>'. htmlspecialchars($row["description"]) .'</p>';
                    echo '<p class="pricing"><b></b> ' . $row["pricing"] . '</p>';
                    echo '<p> <b>Benefits: </b>' . htmlspecialchars($row["environmentalBenefits"]) . '</p>';
					echo '<p>  $<b>' . number_format($row["price"], 0) . '</b></p>';
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
</section>




<?php
include('footer.php');
?>