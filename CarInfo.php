<?php 
include('header.php'); 
include('connect.php');
if($_SESSION['loggedIn'] == false){
  header('Location: signin.php');
}
$plate_id = $_SESSION['plate_id'] = $_GET['plate_id'];
$sql = "SELECT * FROM car WHERE plate_id ='$plate_id'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CarInfo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Car Info</title>
</head>
<body>
  <form action="adderFiles/newAjax.php" method="POST">
    
    <div class="p-3 mb-2 bg-dark text-white">
      <div class="NavBar">
        <div class="Container">
            <div class="List">
                <h1>Car Info</h1>
            </div>
            <div class="Title">
              <span><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
        </div>
      </div>
      <div class="container">
        <div class="container2">
          <div class="form">
            <div class="p-3 mb-2 bg-danger text-white"><h5>Brand Model Year</h5></div>
              <div class="semi-Container">
                  <div class="semi-Container2"><label class="data">Brand</label></div>
                  <div class="semi-Container3"><label class="Ans"><?php echo $res[0]['brand']; ?></label></div>
              </div>
              <div class="semi-Container">
                <div class="semi-Container2"><label class="data">Model</label></div>
                <div class="semi-Container3"><label class="Ans"><?php echo $res[0]['model']; ?></label></div>
              </div>
              <div class="semi-Container">
              <div class="semi-Container2"><label class="data">Year</label></div>
              <div class="semi-Container3"><label class="Ans"><?php echo $res[0]['year']; ?></label></div>
            </div>
            <div class="semi-Container">
              <div class="semi-Container2"><label class="data">Color</label></div>
              <div class="semi-Container3"><label class="Ans"><?php echo $res[0]['color']; ?></label></div>
            </div>
            <div class="semi-Container">
              <div class="semi-Container2"><label class="data">Rating</label></div>
              <div class="semi-Container3"><label class="Ans"><?php echo $res[0]['rating']; ?></label></div>
            </div>
            <div class="semi-Container">
            <div class="card" style="width: 18rem; margin-right: 20px; margin-top:20px;">
              <img src=<?php echo $res[0]['img']; ?> alt="">
            </div>
            </div>
            <div class="semi-Container">
              <div class="semi-Container2"><label class="data">payment</label></div>
              <div class="semi-Container3"><input type="radio" name="payment" value="visa " style="margin-right: 10px;" checked><label class="Ans" style="margin-right: 20px;">visa</label><input type="radio" name="payment" value="cash" style="margin-right: 10px;"><label class="Ans">cash</label></div>
            </div>
            <div class="semi-container">
                <label for="inputPassword2" class="sr-only">pick up date</label>
                <input type="date" name="pickupdate" class="form-control" required>
            </div>
            <div class="semi-container">
              <label for="inputPassword2" class="sr-only">return date</label>
              <input type="date" name="returndate" class="form-control" required>
          </div>
              </div><br>
              
              <button type="submit" value="<?php echo $plate_id?>" name="submit">Reserve</button>
              
            </div>
      </div>
      <div>
      </div>
      </div>
    </div><br><br>
  </form>
    <!-- JavaScript Bundle with Popper -->
</body>
</html>