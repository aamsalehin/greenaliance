<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login here</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"  
    />
    <script src="https://kit.fontawesome.com/72d02e7766.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" a href="./css/style2.css">
    <link rel="stylesheet" href="./css/message.css">
  </head>
  <body>
  <?php include "header.php";?>
    
    
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="login-box">
            <i class="fa-regular fa-user text-white pt-3"></i>
            <!-- <h1>Login</h1> -->
            <h4>Log in as Resident</h4>
            <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='wrongres'){
                echo "<p class='duplicate_message'>invalid password</p>";
              }
              if($message=='notfound'){
                echo "<p class='duplicate_message'>No user found</p>";
              }
            }
            ?>
            <form action="login_res.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
          </div>
          <p class="para-2">
            Create a account <a href="registration.php">Register here</a>
          </p>
        </div>
        <div class="col-md-6">
          <div class="login-box">
            <i class="fa-solid fa-business-time text-white pt-3"></i>
            <!-- <h1>Login</h1> -->
            <h4>Login as Buisness</h4>
            <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='wrong'){
                echo "<p class='duplicate_message'>invalid password</p>";
              }
              if($message=='nouser'){
                echo "<p class='duplicate_message'>No user found</p>";
              }
            }
            ?>
            <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
          </div>
          <p class="para-2">
            Register your buisness <a href="buisnessreg.php">Register here</a>
          </p>
        </div>
      </div>
    </div>


   <?php
   include('footer.php');
   ?>
