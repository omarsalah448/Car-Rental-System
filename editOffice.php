<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Office</title>
</head>
<body>
<?php                     
  //On page 2
  $off['office_id'] = $_POST['submit'];
  $m=  $off['office_id'];
  include('connect.php');
  $sql1 = "SELECT country FROM offices WHERE office_id=$m";
  $sql2 = "SELECT city FROM offices WHERE office_id=$m";
  $sql3 = "SELECT street FROM offices WHERE office_id=$m";
  $res1 = mysqli_query($conn,$sql1);
  $res2 = mysqli_query($conn,$sql2);
  $res3 = mysqli_query($conn,$sql3);
  $result1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
  $result2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
  $result3 = mysqli_fetch_all($res3, MYSQLI_ASSOC);
  //On page 1
  $_SESSION['varname'] = $m;
?>
           <?php
        include('header2.php');
        ?>
        <section class="vh-100" style="background-color: darkmagenta;">
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                <br>
                  <h1 class="text-white mb-4">Edit Office</h1>
          
                  <div class="card" style="border-radius: 15px;">

                  <form action="adderFiles/addNewOffice.php" method="POST">
                    <div class="card-body">
          
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Country</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" name="office_country" class="form-control form-control-lg" placeholder="<?php foreach ($result1 as $m){ ?><?php echo $m['country'];} ?>" disabled/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">
                
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">City</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" class="form-control form-control-lg" name="office_city" value="<?php foreach ($result2 as $m){ ?><?php echo $m['city'];} ?>"/>
          
                        </div>
                      </div>

                      <hr class="mx-n3">
                
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Street</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" class="form-control form-control-lg" name="office_street" value="<?php foreach ($result3 as $m){ ?><?php echo $m['street'];} ?>"/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">
          
                      <div class="px-5 py-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;">Submit</button>
                      </div>
                    </div>
                    </form>
                    </form>    
                        <form action="deleteFiles/deleteOffice.php" method="POST">
                       <button type="submit" style="background-color: red; float: right; margin-bottom: 25px; margin-right: 20px;" name="submit3" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" id="btn" value="<?php echo $off['office_id']; ?>">Delete Office</button>
                  </div>
                 </form>
                  </div>
          
                </div>
              </div>
            </div>
          </section>
</body>
</html>