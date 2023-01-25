<?php 
session_start();
function function_alert($msg) {
    echo "<script>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" href="header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Car-Rental-System</title>
   </head> 
   <body>
   <div class="FirstDiv">
    <header>
    <div class="NavDiv">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="reservation.php">Car Rental System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="reservation.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
                    <?php 
                    if (empty($_SESSION['loggedIn']) or $_SESSION['loggedIn'] == false){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Sign In</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="signup.php">Sign Up</a>
                          </li>
                    <?php } 
                    else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php">Find Car</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="signout.php">Sign Out</a>
                      </li>
                    <?php }?>
            </div>
          </nav>
    </div>
    <script src="validation.js"></script>
    </header>
   </body>
</html>