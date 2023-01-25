<?php 
include('../connect.php');
$type = $_REQUEST["type"];
$sql = $_REQUEST["query"];
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
mysqli_close($conn);
?>
<?php if($type == 'searchBar' or $type == 'checkbox' or $type == 'price') { ?>
<div class="cardContainer" id="allCars">
        <?php foreach ($res as $car){ ?>
          <div class="card" style="width: 18rem; margin-right: 20px; margin-bottom: 10px">
                <img src=<?php echo $car["img"]; ?> class="card-img-top">
                <div class="card-body">
                <h5 class="card-title"><?php echo $car['model']; ?></h5>
                  <h6 class="card-title">Office Location: </h6>
                  <p class="card-text"><?php echo $car['country']; ?></p>
                  <h6 class="card-title">Daily Price: </h6>
                  <p class="card-text"><?php echo $car['daily_price'];?> EGP</p>
                  <a href='carInfo.php?plate_id=<?php echo $car['plate_id']; ?>' class="btn btn-primary">Rent</a>
                </div>
            </div>
          <?php }    ?>
        </div>
<?php } elseif($type == 'searchAdminBarCar') {?>
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
                  <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $car['plate_id']; ?>">Edit Car</button>
                  </form><br>
                  <form action="reserveHistory.php" method="POST">
                  <button class="btn btn-primary" style="background-color: rgb(224, 18, 18);" type="submit" name="submit2" value="<?php echo $car['plate_id']; ?>">Car History</button>
                  </form>
                </div>
            </div>
          <?php }  ?>
    </div>
  <?php } elseif($type == 'searchAdminBarOffice') {?>
    <div class="mainbar2" id="allAdminOffices" id="mainbar2" style="width: 95%;">
              <?php foreach ($res as $off){ ?>
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
            </div> 
            
            <?php } elseif($type == 'searchAdminBarCustomer') {?>
            <div class="mainbar2" id="mainbar3" style="width: 95%;">
              <?php $i=-1;
              foreach ($res as $cus){ ?>
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
              <?php }}  ?>
            </div>
            </div>