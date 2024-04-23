<?php
session_start();
?>



<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	<div class="container">
  <a class="navbar-brand custom_logo" href="index.php"><span>Green Cities Alliance</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ml-2">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php if(isset($_SESSION['residentId'])): ?>
      <li class="nav-item ml-2">
        <a class="nav-link" href="voting.php">Vote</a>
      </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['businessId'])||isset($_SESSION['residentId'])): ?>
        
                <li class="nav-item">
                    <form action="logout.php" method="POST" ">
                        <a href="logout.php" type="submit" class="nav-link">Logout</a>
                    </form>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="userlogin.php">Login</a>
                </li>
                <li class="nav-item ml-2">
        <a class="nav-link" href="register.php">Register</a>
       </li>
            <?php endif; ?>






	  
      
    </ul>
  </div>
  </div>
</nav>