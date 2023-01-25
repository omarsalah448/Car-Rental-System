<?php
session_start();
include("../connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$today=date("Y-m-d");
$plate_id =  $_POST['submit'];
$x=$plate_id;
$sql="UPDATE reserve SET is_rented = 0, return_date='$today' WHERE plate_id='$x';";
$sql2="UPDATE car SET status = 'Active' WHERE plate_id='$x';";
if(mysqli_query($conn, $sql)&&mysqli_query($conn,$sql2)){
    echo "<script>alert('Car is sucessfully returned')</script>";
    echo "<script>window.location.replace('http://localhost/car_rental/profile.php');</script>";                                     
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>

