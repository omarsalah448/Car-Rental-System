<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Report</title>
</head>
<body>
    <?php
    include('header2.php')
    ?>
    <form action="makeResReport.php" method="POST">
        <section class="vh-100" style="background-color: darkmagenta;">
            <div class="container">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                <br>
                  <h1 class="text-white mb-4">Reservation Report</h1>
          
                  <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
          
                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">Start pick-up date</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="date" name="Start" class="form-control form-control-lg" placeholder="Enter start pick-up date" required/>
          
                        </div>
                      </div>
          
                      <hr class="mx-n3">

                      <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
          
                          <h6 class="mb-0">End pick-up date</h6>
          
                        </div>
                        <div class="col-md-9 pe-5">
          
                          <input type="date" name="End" class="form-control form-control-lg" placeholder="Enter End pick-up date" required/>
          
                        </div>
                      </div>
                      <hr class="mx-n3">
      
                    <div class="px-5 py-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" id="btn">Generate</button>
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