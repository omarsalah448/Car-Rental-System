<?php
include('connect.php');
if($conn === false){
die("ERROR: Could not connect. "
    . mysqli_connect_error());
}
$office_city =  $_POST['office_city'];
$office_country = $_POST['office_country'];
$office_street =  $_POST['office_street'];
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO offices (country, city, street)  VALUES ('$office_country',
'$office_city','$office_street')";
if(mysqli_query($conn, $sql)){
echo "<script>alert('Office is sucessfully added')</script>";
echo "<script>window.location.replace('http://localhost/car_rental/admin.php')</script>";                                     
} else{
    echo "ERROR: $sql. "
    . mysqli_error($conn);
}
                                   
// Close connection
mysqli_close($conn);
?>