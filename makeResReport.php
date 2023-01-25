<?php
session_start();
include("connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$start =  $_POST['Start'];
$end = $_POST['End'];
$sql="SELECT r.plate_id,r.customer_id,r.reserve_id,c.fname,c.lname,r.payment,r.pickup_date,r.return_date,c.email,c.phone FROM reserve as r LEFT JOIN customer as c ON r.customer_id=c.customer_id WHERE r.pickup_date BETWEEN '$start' AND '$end';";
$ress = mysqli_query($conn,$sql);
$results = mysqli_fetch_array($ress);
$res = mysqli_query($conn,$sql);
$result = mysqli_fetch_all($res, MYSQLI_ASSOC);
$c=count($result);
$i=0;


if(mysqli_query($conn, $sql)){
    echo " ";

                                 
    } else{
        echo "ERROR: $sql. "
        . mysqli_error($conn);
    }
                                       
    // Close connection
    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Report</title>
</head>
<body>
    <?php
    include('header2.php');
    ?>
    <br>
    <h3 style="text-align: center;">Reservation Report</h3>
    <br>
<div style="width: 90%; align-items: center; text-align: center; margin: auto;">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">plate id</th>
            <th scope="col">customer id</th>
            <th scope="col">reserve id</th>
            <th scope="col">customer first name</th>
            <th scope="col">customer Last name</th>
            <th scope="col">customer email</th>
            <th scope="col">customer phone number</th>
            <th scope="col">reserve date</th>
            <th scope="col">return date</th>
            <th scope="col">payment</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $row){ ?>
                <tr>
                  <th scope="row"><?php echo $row['plate_id']; ?></th>
                  <td><?php echo $row['customer_id']; ?></td>
                  <td><?php echo $row['reserve_id']; ?></td>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['lname']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['pickup_date']; ?></td>
                  <td><?php echo $row['return_date']; ?></td>
                  <td><?php echo $row['payment']; ?></td>
                </tr>
                <?php }  ?>
        </tbody>
      </table>
</div>
</body>
</html>