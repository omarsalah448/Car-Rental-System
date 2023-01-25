<?php
    session_start();
    include('connect.php');
    include('header2.php');
    $id= $_POST['submit'];
    $start =  $_POST['Start'];
    $end = $_POST['End'];
    $sql="SELECT * FROM car as c JOIN reserve as r ON c.plate_id=r.plate_id JOIN customer as x ON x.customer_id=r.customer_id WHERE c.plate_id='$id' AND r.pickup_date BETWEEN '$start' AND '$end';";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car History Report</title>
</head>
<body>
    <br>
    <h3 style="text-align: center;">Car History Report</h3>
    <br>
<div style="width: 90%; align-items: center; text-align: center; margin: auto;">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">plate id</th>
            <th scope="col">reserve id</th>
            <th scope="col">Customer email</th>
            <th scope="col">reserve date</th>
            <th scope="col">return date</th>
            <th scope="col">payment</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $row){ ?>
                <tr>
                  <th scope="row"><?php echo $row['plate_id']; ?></th>
                  <td><?php echo $row['reserve_id']; ?></td>
                  <td><?php echo $row['email']; ?></td>
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
