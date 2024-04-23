
<?php
session_start();
if (!isset($_SESSION['businessId'])) {
    header("Location: ../userlogin.php"); // Redirect to login page if not logged in
    exit();
}
?>
  
  <?php include "header.php";?>
    <div class="signup-box container">
      
      <h4 class="pt-5">Add New Product or Service</h4>
    
      <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='added'){
                echo "<p class='added_message'> Product added Succesfully!</p>";
              }
              if($message=='duplicate'){
                echo "<p class='duplicate_message'>Product already added! Try new one</p>";
              }
            }
            ?>
     <form action="process_product_add.php" method="POST" class="mb-5">
            <div class="form-group">
                <label for="productName">Product/Service Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="Product">Product</option>
                    <option value="Service">Service</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3 ">Register</button>
        </form>
    </div>
    
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="logo">
            <a class="navbar-brand custom_logo" href="#"><span>Green Cities Allience</span></a>
          </div>
          <div class="social_icon text-center">
            <a href="#"><span><i class="fa fa-facebook"></i></span></a>
            <a href="#"><span><i class="fa fa-instagram"></i></span></a>
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