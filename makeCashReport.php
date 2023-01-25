<?php
session_start();
include("connect.php");
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$start =  $_POST['Start'];
$end = $_POST['End'];
$sql="SELECT SUM(DATEDIFF(LEAST('$end',return_date), GREATEST('$start',pickup_date))*daily_price) as x FROM reserve NATURAL JOIN car NATURAL JOIN category WHERE ((pickup_date >= '$start' AND return_date <= '$end') OR ((pickup_date >= '$start' AND pickup_date <= '$end') AND return_date >= '$end') OR (pickup_date <= '$start' AND return_date >= '$start'));";// $ress = mysqli_query($conn,$sql);
// $results = mysqli_fetch_array($ress);
$res = mysqli_query($conn,$sql);
$result = mysqli_fetch_all($res, MYSQLI_ASSOC);
// $c=count($result);
// $i=0;

$sql="SELECT r.customer_id,r.reserve_id, c.plate_id, cat.daily_price,DATEDIFF(LEAST('$end',r.return_date), GREATEST('$start',r.pickup_date)) diff FROM car c NATURAL JOIN reserve r JOIN category cat ON c.cat_name=cat.cat_name WHERE ((r.pickup_date >= '$start' AND r.return_date <= '$end') OR ((r.pickup_date >= '$start' AND r.pickup_date <= '$end') AND r.return_date >= '$end') OR (r.pickup_date <= '$start' AND r.return_date >= '$start'));";
$res2 = mysqli_query($conn,$sql);
$result2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);

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
    <h3 style="text-align: center;">Cash Report</h3>
    <br>
<div style="width: 90%; align-items: center; text-align: center; margin: auto;">

    <table class="table">
        <thead class="thead-dark">
          <th>
            
          </th>
        </thead>
        <tbody>
            <?php foreach ($res as $row){ ?>
                <tr>
                  <th>Total Cash: <?php echo $row['x']; ?> EGP</th>
                </tr>
                <?php }  ?>
        </tbody>
      </table>

      <table class="table">
      <thead class="thead-dark">
          <tr>
            <th scope="col">customer id</th>
            <th scope="col">reserve id</th>
            <th scope="col">plate id</th>
            <th scope="col">duration</th>
            <th scope="col">daily Price</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($result2 as $res){ ?>
                <tr>
                  <th scope="row"><?php echo $res['customer_id']; ?></th>
                  <td><?php echo $res['reserve_id']; ?></td>
                  <td><?php echo $res['plate_id']; ?></td>
                  <td><?php echo $res['diff']; ?></td>
                  <td><?php echo $res['daily_price']; ?></td>
                </tr>
                <?php }  ?>
        </tbody>
      </table>
      
</div>
</body>
</html>