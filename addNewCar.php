<?php
include('connect.php');
if($conn === false){
die("ERROR: Could not connect. "
    . mysqli_connect_error());
}
$car_brand =  $_POST['brand'];
$car_plate_id = $_POST['plate_id'];
$car_model = $_POST['model'];
$car_year =  $_POST['year'];
$car_color = $_POST['color'];
$car_img =  $_POST['img'];
$car_office_id =  $_POST['office_id'];
$car_cat_name =  $_POST['cat_name'];
$car_rating =  $_POST['rating'];
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO car (plate_id, brand, model, color, img, office_id,cat_name,status,year,rating)  VALUES ('$car_plate_id','$car_brand',
'$car_model','$car_color','$car_img','$car_office_id','$car_cat_name','Active','$car_year','$car_rating')";
if(mysqli_query($conn, $sql)){
echo "<script>alert('Car is sucessfully added')</script>";
echo "<script>window.location.replace('http://localhost/car_rental/admin.php')</script>";                                     
} else{
    echo "ERROR: $sql. "
    . mysqli_error($conn);
}
                                   
// Close connection
mysqli_close($conn);
?>