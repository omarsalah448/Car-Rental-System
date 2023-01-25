<?php 
include('header.php'); 
include('connect.php');

$email = $password = '';

if (isset($_POST['submit_signin'])){
    $email = $_POST['email_signin'];
    $password = md5($_POST['password_signin']);
    // admin sigin
    $sql = "SELECT admin_id FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if ($res){
        $_SESSION['loggedIn'] = true;
        $_SESSION['admin'] = true;
        $_SESSION['name'] = $res[0]['admin_id'];
        header('Location: admin.php');
    }
    else{
        // customer signin
        $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($res){
            $_SESSION['loggedIn'] = true;
            $_SESSION['admin'] = false;
            $_SESSION['name'] = $res[0]['fname'];
            $_SESSION['customer_id'] = $res[0]['customer_id'];
            header('Location: profile.php');
        }
        else {
            function_alert('Email and password do not match !');
        }
    }
    // free result from memory
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<link rel="stylesheet" href="infinity.css">
<form name="sign_in_form" action="signin.php" onsubmit="return validateNotEmpty(this)" method="POST">
<section class="ShowCase">
        <div class="Container grid">
            <div class="Showcase-text">
                <h2> Car Rental System </h2>
                <p style="padding-bottom: 10px;">
                Welcome to our car rental company. Wherever you are around the globe, renting a car is made easier.                </p>
                <a href="reservation.php" style="border: solid white 1px; padding: 10px; color: white;">Search Now</a>
            </div>

            <div class="Showcase-card">
                <h2 style="color: black; margin: 10px 20px;">Login</h2>
                <form action="">
                    <div>
                        <input type="email" name="email_signin" placeholder="Enter Email" value="<?php echo $email; ?>" required> 
                    </div>
                    <div>
                        <input type="password" name="password_signin" required placeholder="Enter Password">
                    </div>
                
                    
                    <div>
                        <button class="submit-button" type="submit" name="submit_signin" id="submit_signup">Login</button>
                    </div>
                    <div>
                        <button class="submit-button" style="background-color: white; color: darkmagenta; border: solid 1px darkmagenta;"><a href="signup.php" style="text-decoration: none; color: black;">create new account</a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</form>
   <div class="div-after">
       
   </div>
   <div>
       <p class="desc">
           Welcome to our car rental company. Wherever you are around the globe, renting a car is made easier.
       </p>
   </div>
   

</html>