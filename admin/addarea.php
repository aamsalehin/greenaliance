
<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header("Location: ../userlogin.php"); // Redirect to login page if not logged in
    exit();
}
?>


<?php include "header.php";?>
    
    
    <div class="login-box mb-5 container" >
      <h1>Add New Area</h1>
      <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='added'){
                echo "<p class='added_message'>Added Succesfully!</p>";
              }
              if($message=='duplicate'){
                echo "<p class='duplicate_message'>Area already added! Try new one</p>";
              }
            }
            ?>
      <form action="process_add_area.php" method="POST">
            <div class="mb-3">
                <label for="areaName" class="form-label">Area Name</label>
                <input type="text" class="form-control" id="areaName" name="areaName" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Area</button>
        </form>
    </div>

    <!-- footer  -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="logo">
            <a class="navbar-brand custom_logo" href="#"><span>Green Cities Allience</span></a>
          </div>
          <div class="social_icon text-center">
            <a href="#"><span><i class="fa fa-facebook"></i></span></a>
            <a href="#"><span><i class="fa fa-instagram"></i></span></a>
            <a href="#"><span><i class="fa fa-twitter"></i></span></a>
          </div>
          <div class="copy">
            <h6>&copy; 2024 Designed By salehin Chowdhury</h6>
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/javascript.js"></script>


</body>
</html>