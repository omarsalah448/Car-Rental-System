<?php
session_start();
include('../connect.php');
// for signup validation
if (!$_SESSION['errors']){
    // to prevent sql injections
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password_orig = $_POST['password'];
    $password = md5($_POST['password']);
    $retypePassword = $_POST['retype_password'];
    $sql = "INSERT INTO customer(fname, lname, email, password,phone) VALUES('$fname', '$lname', '$email', '$password','$phone')";
    // if above insertion worked
    if (mysqli_query($conn, $sql)){
        $sql = "SELECT customer_id FROM customer WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['customer_id'] = $res[0]['customer_id'];
        $_SESSION['admin'] = false;
        $_SESSION['name'] = $fname;
        $_SESSION['loggedIn'] = true;
        header('Location: ../profile.php');
    }
}
else{
    header('Location: ../signup.php');
}
?>
