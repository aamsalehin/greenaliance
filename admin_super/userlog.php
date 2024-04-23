<?php
include('header.php');
?>


    <div class="container signup-box mb-5">
    <div class="container">
        <h2 class='text-white pt-3'>Login</h2>

        <?php
            // Check if there is a notification from the registration process
            if(isset($_GET['result'])) {
              $message= $_GET["result"];
              if($message=='invalid'){
                echo "<p class='duplicate_message'>Invalid Credentials!</p>";
              }
              
            }
            ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:  <b class="text-green">(admin@admin.com)</b></label>
               
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:<b class="text-green" >(admin)</b></label>
               <
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5 ">Login</button>
        </form>
    </div>
    </div>
<?php
include('../footer.php');
?>
