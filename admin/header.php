<?php
session_start();
?>
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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	<div class="container">
  <a class="navbar-brand custom_logo" href="../index.php"><span>GTA</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ml-2">
        <a class="nav-link" href="index.php">All products</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" href="addproduct.php">Add New Service</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" href="productdetails.php">Add product details</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" href="addarea.php">Add area</a>
      </li>
	  
      <!-- <li class="nav-item ml-2">
        <a class="nav-link" href="#about">About</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" href="#services">Services</a>
      </li> -->
	  
      <?php if(isset($_SESSION['businessId'])): ?>
                <li class="nav-item">
                    <form action="logout.php" method="POST" ">
                        <a href="logout.php" type="submit" class="nav-link">Logout</a>
                    </form>
                </li>
            
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="../userlogin.php">Login</a>
                </li>
            <?php endif; ?>






	  
      
    </ul>
  </div>
  </div>
</nav>