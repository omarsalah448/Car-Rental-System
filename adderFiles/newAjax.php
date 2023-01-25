<?php
session_start();
include("../connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$plate_id = $_POST['submit'];
$customer_id = $_SESSION['customer_id'];
$pickup_date = $_POST['pickupdate'];
$return_date = $_POST['returndate'];
$payment = $_POST['payment'];
if ($pickup_date < $return_date){
$sql = "INSERT INTO reserve (plate_id, customer_id, pickup_date, return_date ,payment, is_rented) VALUES('$plate_id', '$customer_id',' $pickup_date','$return_date','$payment', 1)";
}else{
    $sql = "INSERT INTO reserve (plate_id, customer_id, pickup_date, return_date ,payment, is_rented) VALUES('$plate_id', '$customer_id','$return_date','$pickup_date','$payment', 1)";

}
$sql2="UPDATE car SET status = 'Rented' WHERE plate_id='$plate_id';";
if(mysqli_query($conn, $sql)&&mysqli_query($conn,$sql2)){
    echo "<script>alert('reservation is sucessfully done!')</script>";
    echo "<script>window.location.replace('http://localhost/car_rental/profile.php');</script>";                                     
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>

