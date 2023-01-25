<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation History</title>
</head>
<body>
    <?php
    session_start();
    include('connect.php');
    include('header2.php');
    $car['plate_id']= $_POST['submit2'];
    $id=$car['plate_id'];
    $sql1 = "SELECT brand FROM car WHERE plate_id='$id';";
    $res = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_all($res, MYSQLI_ASSOC);
    ?>
    <form action="makeCarResReport.php" method="POST">
        <section class="vh-100" style="background-color: darkmagenta;">
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                <br>
                  <h1 class="text-white mb-4">Reservation History</h1>
          
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
          
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Start reservation date</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="date" name="Start" class="form-control form-control-lg" placeholder="Enter start reservation date" required/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">

                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">End reservation date</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="date" name="End" class="form-control form-control-lg" placeholder="Enter End reservation date" required/>
          
                        </div>
                      </div>
                      <hr class="mx-n3">
      
                    <div class="px-5 py-4">
                        <button type="submit" id="btn" name="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" id="btn" value="<?php echo $id; ?>">Generate</button>
                    </div>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br>
          </section>
          </form>

</body>
</html>