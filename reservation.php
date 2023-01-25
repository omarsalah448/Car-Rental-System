<?php 
include('header.php'); 
include('connect.php');

$sql = "SELECT * FROM car NATURAL JOIN offices NATURAL JOIN category WHERE status LIKE '%Active%'";
$sql2="SELECT DISTINCT country FROM offices;";
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
    <link rel="stylesheet" href="search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Find Car</title>
</head>
<body>
<form action="ajax/validate.php?name=l" onsubmit="return validateNotEmpty(this)" method="POST">
    <div class="verybigcontainer">
    <div class="sidebar">
        <h3 style="padding-left: 20px;">Filters</h3>
        <div class="con">
  
          <h5 class="filters">Location</h5>
          <div class="form-check">
          <select id="locationReservation" onchange="handleCheckBox();" class="form-select" aria-label="Enabled select example" name="country" style="width: 240px">
                        <option value="none">Choose Location</option>
                        <?php foreach ($res2 as $car){ ?>
                          <option value=<?php echo $car['country'] ?> ><?php echo $car['country'] ?></option>
                           <?php }  ?>
              </select>
              <br>
          </div>  
        </div>
        <div class="con">
            <h5 class="filters">Categories</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sedanCheckbox"  onclick="handleCheckBox();" value=" id="flexCheckDefault" style="margin-left: 20px;">
                <label class="form-check-label" for="flexCheckDefault" style="margin-left: 5px;">
                  Sedan
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="hatchBackCheckbox"  onclick="handleCheckBox();" value="" id="flexCheckDefault" style="margin-left: 20px;">
                <label class="form-check-label" for="flexCheckDefault" style="margin-left: 5px;">
                  Hatchback
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="suvCheckbox"  onclick="handleCheckBox();" value="" id="flexCheckDefault" style="margin-left: 20px;">
                <label class="form-check-label" for="flexCheckDefault" style="margin-left: 5px;">
                  SUV 
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sportsCarCheckbox"  onclick="handleCheckBox();" value="" id="flexCheckDefault" style="margin-left: 20px;">
                <label class="form-check-label" for="flexCheckDefault" style="margin-left: 5px;">
                  Sports Car
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="coupeCheckbox"  onclick="handleCheckBox();" value="" id="flexCheckChecked" style="margin-left: 20px;">
                <label class="form-check-label" for="flexCheckChecked" style="margin-left: 5px;">
                  Coupe   
                </label>             
              </div>
        </div>
    </div>
    <div class="mainbar">
        <div class="input-group" style="width: 90%; float: left;">
            <input type="search" class="form-control rounded" placeholder="Search"  id="searchEntry" onkeyup="handleSearch(this.value)" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" name="search_button" class="btn btn-outline-primary">search</button>
          </div><br><br><br>
        <div class="cardContainer" id="allCars">
        <?php foreach ($res as $car){ ?>
          <div class="card" style="width: 18rem; margin-right: 20px; margin-top:20px;">
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
          <?php }  ?>
        </div>
    </div>
    </div>
    <script src="rate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </form>
</body>
</html>