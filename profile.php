<?php 
include('header.php'); 
include('connect.php');
if ($_SESSION['loggedIn'] == false){
    header('Location: signin.php');
}
$customer_id = $_SESSION['customer_id'];
$sql = "SELECT * FROM customer NATURAL JOIN car NATURAL JOIN reserve NATURAL JOIN category WHERE customer_id='$customer_id' AND status='Rented' AND is_rented=1";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
$currently_renting = true;
// if result is null then customer has no reserved cars
if(!isset($res[0])){
    $sql = "SELECT * FROM customer WHERE customer_id='$customer_id'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $currently_renting = false;
}
// free result from memory
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
        <div class="Container">
            <h1>
                <?php 
                $user_name = $res[0]['fname'];
                echo "<h1>Welcome $user_name</h1>"
                ?>
            </h1>
            <p>You can select any available car right now and be on your way. We always got your back.</p>
            <button type="button" class="btn btn-danger"><a href="reservation.php" style="text-decoration: none;color:white;">Search Now</a></button>
        </div>
    <h2 style="margin-left: 100px;margin-top: 40px;">Current Rents</h2>
    <div class="CarContainer" style="display: grid;">
    
    <?php if($currently_renting == true){
        foreach ($res as $car){ ?>
            <div style="display: flex; margin-bottom: 30px;">
            <div class="carImage">
            <div class="card" style="width: 18rem; margin-right: 20px; margin-top:20px;">
                <img src=<?php echo $car['img']; ?> alt="">
            </div>
            </div>
            <div class="CarInfo">
                <?php 
                $x=$car['plate_id'];
                $y=$car['customer_id'];
                $z=$car['reserve_id'];
                $sql3="SELECT DATEDIFF(return_date, pickup_date)*daily_price as m FROM reserve NATURAL JOIN car NATURAL JOIN category WHERE plate_id = '$x' AND customer_id = '$y' AND reserve_id = '$z';";
                $result3 = mysqli_query($conn, $sql3);
                $res3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                ?>
                <h2><?php echo $car['model']; ?></h2>
                <label>Taken from:</label><span>  <?php echo $car['pickup_date']; ?></span>
                <br>
                <label>Returned in:</label><span>  <?php echo $car['return_date'];?></span>
                <br>
                <label style="font-weight: bold;">Payment: </label><span>  <?php echo $car['payment'];?></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <label style="font-weight: bold;">Price: </label><span>  <?php foreach ($res3 as $fu){echo $fu['m'];};?> EGP</span>
                <br>
                <br>
                <form action="adderFiles/returnCar.php" method="POST">
                <button type="submit" name="submit" class="btn btn-danger" value="<?php echo $car['plate_id'];?>">Return</button>
                </form>
            </div>
        </div>
            <?php }
            }
            else{
                echo "You don't have any rented cars";
            } ?>
    </div>
    <br><br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</body>
</html>