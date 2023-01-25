<?php
session_start();
$x = $_SESSION['varname'];
echo '$x';
include("../connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$car_status =  $_POST['status'];
$car_office_id = $_POST['office_id'];
$car_rating = $_POST['rating'];
$sql="UPDATE car SET status = '$car_status', office_id = '$car_office_id',rating='$car_rating' WHERE plate_id='$x';";
if(mysqli_query($conn, $sql)){
    echo "<script>alert('Car is sucessfully Edited')</script>";
    echo "<script>window.location.replace('http://localhost/car_rental/admin.php');</script>";                                     
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>


