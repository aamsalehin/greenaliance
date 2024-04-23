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
                echo "<p class='duplicate_message'>Resident already added! Try new one</p>";
              }
            }
            ?>
      
      <form action="register_resident.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="ageGroup">Age Group:</label>
                <select class="form-control" id="ageGroup" name="ageGroup">
                    <option>18-25</option>
                    <option>26-35</option>
                    <option>36-45</option>
                    <option>46-55</option>
                    <option>56+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
          </select>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <select class="form-control" id="location" name="location">
                    <?php
                   
                    $conn = new mysqli('localhost', 'root', '', 'greencity');
                    $sql = "SELECT areaId, name FROM areas";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['areaId'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="interests">Select Interests:</label>
                <select multiple class="form-control" id="interests" name="interests[]">
                    <?php
                    $sql = "SELECT productId, productName FROM products";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['productId'] . "'>" . $row['productName'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
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