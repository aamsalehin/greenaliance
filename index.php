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
<body data-spy="scroll" data-target="navbarNav" data-offset="70">

<?php include "header.php";?>

<section id="home" class="banner cover-bg">
	<div class="container h-100">
		<div class="row align-items-center h-100">
			<div class="col-12 caption text-center">
				<h4 class="mt-20 mb-20">Hello , this is</h4>
				<h2 class="mt-20">Green Cities Alliance</h2>
				<p class="mt-20">Go Green.</p>
				<div class="social_icon text-center mt-20">
					<a href="#"><span><i class="fa fa-facebook"></i></span></a>
					<a href="#"><span><i class="fa fa-instagram"></i></span></a>
					<a href="#"><span><i class="fa fa-twitter"></i></span></a>
				</div>
			</div>
		</div>
	</div>
</section>





<section id="about" class="about section_padding pb-0">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 section_title text-center">
				<p>who we are</p>
				<h3>about us</h3>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="part_photo">
					<img class="img-fluid" src="images/green-cityscape.png">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="part_text">
					<h4 class="mb-30">Green Cities Allience</h4>
					<p class="pb-35">Green cities allience focused on ambitious leadership for the enviorment. Our work generates new thinking and has support for enviormental solutions in the UK.</p>

					<div class="info mt-35">
						<ul>
							<li>
								<span class="title"><strong>Name :</strong></span>
								<span class="value"><strong>Green Cities Alliance</strong></span>
							</li>
							<li>
								<span class="title"><strong>Address:</strong></span>
								<span class="value"><strong>UK</strong></span>
							</li>
							<li>
								<span class="title"><strong>Phone Number :</strong></span>
								<span class="value"><strong>+1234567</strong></span>
							</li>
						</ul>
					</div>
					
				</div>
				<a href="buisnessreg.html" class="btn btn-success mb-5">Register your Buisness with us</a>
			</div>
		</div>
		
	</div>
</section>

<section class="best_me section_padding text-center cover-bg">
	<div class="container">
		
		<h2>Go Green</h2>
	</div>
</section>

<section id="services" class="services section_padding">
	<div class="container">
		<div class="row">
			<div class="section_title text-center">
				<p>What Does Green Cities Allience Offer?</p>
				<h3>Services</h3>
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

<section id="contact" class="contact section_padding cover-bg">
	<div class="container">
		<div class="row">
			<div class="section_title text-center">
				<p>GET IN TOUCH</p>
				<h3>CONTACT</h3>
			</div>

			<div class="col-md-12">
				<div class="part_info">
					<div class="row">
						<div class="col-md-4">
							<div class="info-block text-center">
								<div class="icon">
									<i class="fa fa-map-marker"></i>
								</div>
								<h5>My Location:</h5>
								<p>UK</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="info-block text-center">
								<div class="icon">
									<i class="fa fa-mobile"></i>
								</div>
								<h5>Phone Number:</h5>
								<p>+123456</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="info-block text-center">
								<div class="icon">
									<i class="fa fa-envelope"></i>
								</div>
								<h5>Email Address:</h5>
								<p>greencities@gmail.com</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
	</div>
</section>

<?php
include('footer.php');
?>