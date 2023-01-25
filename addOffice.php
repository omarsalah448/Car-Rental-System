<?php 
include('connect.php');
session_start();
// free result from memory


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Add Office</title>
</head>
<body>
        <?php
        include('header2.php');
        ?>
        <form method="POST" action="addNewOfficer.php">
        <section class="vh-100" style="background-color: darkmagenta;">
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                <br>
                  <h1 class="text-white mb-4">Add New Office</h1>
          
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
          
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Country</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" class="form-control form-control-lg" name="office_country" placeholder="Enter Office Country"/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">
                
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">City</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" class="form-control form-control-lg" name="office_city" placeholder="Enter Office City"/>
          
                        </div>
                      </div>

                      <hr class="mx-n3">
                
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Street</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="text" class="form-control form-control-lg" name="office_street" placeholder="Enter Office Street"/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">
          
                      <div class="px-5 py-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;">Submit</button>
                      </div>
          
                    </div>
                  </div>
          
                </div>
              </div>
            </div>
          </section>

        </form>
</body>
</html>