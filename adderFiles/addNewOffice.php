<?php
session_start();
$x = $_SESSION['varname'];
include("../connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$office_city =  $_POST['office_city'];
$office_country = $_POST['office_country'];
$office_street =  $_POST['office_street'];
$sql="UPDATE offices SET street = '$office_street', city='$office_city' WHERE office_id=$x;";
if(mysqli_query($conn, $sql)){
    echo "<script>alert('Office is sucessfully Edited')</script>";
    echo "<script>window.location.replace('http://localhost/car_rental/admin.php');</script>";                                     
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>


