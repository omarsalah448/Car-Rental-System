<?php
    session_start();
    include('connect.php');
    include('header2.php');
    $date =  $_POST['date'];
    // $sql="SELECT DISTINCT plate_id,status,model,brand FROM reserve NATURAL JOIN car WHERE '$date' BETWEEN pickup_date AND return_date
    //       UNION
    //       (SELECT DISTINCT plate_id,status,model,brand FROM car WHERE plate_id NOT IN (SELECT plate_id FROM reserve NATURAL JOIN car WHERE '$date' BETWEEN pickup_date AND return_date));";
    $sql="SELECT DISTINCT C.plate_id,Q.payment,C.model,C.brand FROM car AS C LEFT JOIN (SELECT plate_id, payment FROM reserve where '$date' BETWEEN pickup_date AND return_date) AS Q ON C.plate_id = Q.plate_id;";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Status Report</title>
</head>
<body>
    <br>
    <h3 style="text-align: center;">Car Status Report</h3>
    <br>
<div style="width: 90%; align-items: center; text-align: center; margin: auto;">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">plate id</th>
            <th scope="col">Car status</th>
            <th scope="col">Model</th>
            <th scope="col">Brand</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $row){ ?>
                <tr>
                  <th scope="row"><?php echo $row['plate_id']; ?></th>
                  <?php
                  if($row['payment']){
                    echo "<td>Rented</td>";
                  }else{
                    echo "<td>Not Rented</td>";
                  }
                  ?>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['brand']; ?></td>
                </tr>
                <?php }  ?>
        </tbody>
      </table>
</div>
</body>
</html>
