<?php 
include('header.php'); 
include('connect.php');

$_SESSION['pass'] = '';
$_SESSION['retype'] = '';
$_SESSION['errors'] = [];
?>

<!DOCTYPE html>
<form action="ajax/validate.php?name=l" onsubmit="return validateNotEmpty(this)" method="POST">
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control"  name="first_name" required> 
                      <label class="form-label" for="form3Example1c">First Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="last_name" id="form3Example3c" class="form-control"> 
                      <label class="form-label" for="form3Example3c">Last Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="phone_number" id="form3Example1c" class="form-control" required> 
                      <label class="form-label" for="form3Example1c">Phone Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="email" onkeyup="email_check(this.value)" required>
                      <label class="form-label" for="form3Example4cd">Email</label><br>
                      <label class="error_check" id="check_email"></label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" onkeyup="pass_check(this.value)" id="form3Example4cd" class="form-control" required>
                      <label class="form-label" for="form3Example4cd">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="retype_password" id="retype_password" onkeyup="retype_pass_check(this.value)" class="form-control" required>
                      <label class="form-label" for="form3Example4cd">Renter Password</label><br>
                      <label class="error_check" id="check_retype_password"></label>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit_signup">Register</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2634-genesisunveilsg90exteriorimages-1638281750.jpg"
                  class="img-fluid" alt="Sample image" style="border-radius:10%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

</html>