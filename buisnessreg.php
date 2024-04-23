<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" a href="css\style3.css">
    <link rel="stylesheet" a href="css\message.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />

  </head>
  <body>
  <?php include "header.php";?>
    <div class="signup-box container">
      <h1>Sign Up</h1>
      <h4>Register Your Buisness Here</h4>
     
      <?php
            
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='added'){
                echo "<p class='added_message'> Buisness added Succesfully!</p>";
              }
              if($message=='duplicate'){
                echo "<p class='duplicate_message'>Buisness already added! Try new one</p>";
              }
            }
            ?>
      
      <form action="process_business_registration.php" method="POST">
            <div class="form-group">
                <label for="businessName">Business Name</label>
                <input type="text" class="form-control" id="businessName" name="businessName" required>
            </div>
            <div class="form-group">
                <label for="contactPerson">Contact Person</label>
                <input type="text" class="form-control" id="contactPerson" name="contactPerson" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="address1">Address Line 1</label>
                <input type="text" class="form-control" id="address1" name="address1" required>
            </div>
            <div class="form-group">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control" id="address2" name="address2">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <select class="form-control" id="area" name="area">
                    <?php
                    include 'get_areas.php';
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>


      <p>
        By clicking the Sign Up button,you agree to our <br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p>
    </div>
    <p class="para-2">
      Already have an account? <a href="userlogin.php">Login here</a>
    </p>
   <?php
   include('footer.php');
   ?>