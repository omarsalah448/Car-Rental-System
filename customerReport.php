<?php
    session_start();
    include('connect.php');
    $cus['customer_id']=$_POST['submit'];
    $id= $cus['customer_id'];
    $sql="SELECT c.customer_id,c.fname,c.lname,ca.plate_id,ca.model,r.reserve_id,r.pickup_date FROM customer as c JOIN reserve as r ON r.customer_id=c.customer_id JOIN car as ca ON ca.plate_id=r.plate_id WHERE c.customer_id='$id';";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Report</title>
</head>
<body>
    <?php
    include('header2.php');
    ?>
    <br>
    <h3 style="text-align: center;">Customer Report</h3>
    <br>
<div style="width: 90%; align-items: center; text-align: center; margin: auto;">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">customer id</th>
            <th scope="col">customer fname</th>
            <th scope="col">customer lname</th>
            <th scope="col">car plate id</th>
            <th scope="col">car model</th>
            <th scope="col">reserve id</th>
            <th scope="col">reserve date</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $row){ ?>
                <tr>
                  <th scope="row"><?php echo $row['customer_id']; ?></th>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['lname']; ?></td>
                  <td><?php echo $row['plate_id']; ?></td>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['reserve_id']; ?></td>
                  <td><?php echo $row['pickup_date']; ?></td>
                </tr>
                <?php }  ?>
        </tbody>
      </table>
</div>
</body>
</html>
