<?php
session_start();
include("../connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$plate_id =  $_POST['submit3'];
$x=$plate_id;
$sql="DELETE FROM car WHERE plate_id='$x';";
if(mysqli_query($conn, $sql)){
    echo "<script>alert('Car is sucessfully deleted')</script>";
    echo "<script>window.location.replace('http://localhost/car_rental/admin.php');</script>";                                     
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>

