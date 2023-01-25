<?php 
include('connect.php');
session_start();

$sql = "SELECT * FROM car";
$sql2 = "SELECT * FROM offices";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
$res2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
        <?php
        include('header2.php');
        ?>
        <br>
        <div style="display: flex; width: 75%; margin: auto;">
          <div class="form-check">
            <input class="form-check-input" type="radio" id="carsRadioButton" onclick="adminRadioButton()" name="flexRadioDefault" id="flexRadioDefault1"  checked>
            <label class="form-check-label" for="flexRadioDefault1" style="padding-right: 20px;">
              Cars
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="officesRadioButton" onclick="adminRadioButton()" name="flexRadioDefault"  id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2" style="padding-right: 20px;">
              offices
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="customersRadioButton" name="flexRadioDefault" onclick="adminRadioButton()" id="flexRadioDefault3">
            <label class="form-check-label" for="flexRadioDefault2">
              customers
            </label>
          </div>
        </div>
        <br>
            <div class="input-group" style="width: 75%; align-items: center; text-align: center; margin: auto;">
                <input type="search" class="form-control rounded" placeholder="Search" onkeyup="handleAdminSearch(this.value)"  aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
              </div><br><br><br>
             <div class="mainbar" id="allAdminCars" style="width: fit-content;">
             <?php foreach ($res as $car){ ?>
          <div class="card" style="width: 18rem; margin-right: 20px; margin-top:20px;">
                <img src=<?php echo $car["img"]; ?> class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $car['brand']; ?></h5>
                  <h6 class="card-title"><?php echo $car['model']; ?></h6>
                  <h7 class="card-title">Rating: <span><?php echo $car['rating']; ?></span></h7><br>
                  <h7 class="card-title">Office id: <span><?php echo $car['office_id']; ?></span></h7><br>
                  <h7 class="card-title">Status: <span><?php echo $car['status']; ?></span></h7><br><br>
                  <form action="editCar.php" method="POST">
                  <button class="btn btn-primary" type="submit" name="submit" <?php if($car['status']=="Rented") echo "disabled" ?> value="<?php echo $car['plate_id']; ?>">Edit Car</button>
                  </form><br>
                  <form action="reserveHistory.php" method="POST">
                  <button class="btn btn-primary" style="background-color: rgb(224, 18, 18);" <?php if($car['status']=="Rented") echo "disabled" ?> type="submit" name="submit2" value="<?php echo $car['plate_id']; ?>">Car History</button>
                  </form>
                </div>
            </div>
          <?php }  ?>
        </div>
            <!-- <div class="mainbar2" id="allAdminOffices" id="mainbar2">
              <?php $i=-1;
              foreach ($res2 as $off){ ?>
                <?php
                $i++;
                ?>
                <div class="officeContainer">
                  <form action="editOffice.php" method="POST">
                 <div class="card" style="width: 18rem; margin-right: 10px;">
                  <div class="card-header">
                  <?php echo $off['country']; ?>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $off['city']; ?></h4>
                    <h5 class="card-title"><?php echo $off['street']; ?></h5>
                    <p class="card-text">Office Id: <?php echo $off['office_id'];?></p>
                    <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $off['office_id']; ?>">Edit office</button>
                  </div>
                </div>
                </form>
              </div>
              <?php }  ?>
            </div>
            </div>       -->



            <!-- <div class="mainbar2" id="mainbar3">
              <?php $i=-1;
              foreach ($res3 as $cus){ ?>
                <?php
                $i++;
                ?>
                <div class="officeContainer">
                  <form action="customerReport.php" method="POST">
                 <div class="card" style="width: 18rem; margin-right: 10px;">
                  <div class="card-header">
                  <?php echo $cus['fname']; ?>
                  <?php echo " "?>
                  <?php echo $cus['lname']; ?>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $cus['phone']; ?></h4>
                    <h5 class="card-title">customer id: <?php echo $cus['customer_id']; ?></h5>
                    <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $cus['customer_id']; ?>">Get Customer Report</button>
                  </div>
                </div>
                </form>
              </div>
              <?php }  ?>
            </div>
            </div> -->


            <br><br>
            <script src="admin.js">
            </script>     
</body>
</html>

 