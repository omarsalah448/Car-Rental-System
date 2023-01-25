<?php 
include('connect.php');

session_start();
// free result from memory

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Add Car</title>
</head>
<body>
        <?php
        include('header2.php');
        ?>
        <form method="POST" action="addNewCar.php">
    <section class="vh-100" style="background-color: darkmagenta;">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <br>
              <h1 class="text-white mb-4">Add New Car</h1>
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Brand</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="brand" placeholder="Enter Car Brand" required/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
            
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Model</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="model" placeholder="Enter Car Model" required/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">


      
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Year</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="year" placeholder="Enter Year" required/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Plate Number</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <span id="check_it"></span>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Plate Number" name="plate_id"  id="plate_id" onInput="check_car_plate(this.value),fun()" required/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Color</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="color" placeholder="Enter Color" required/>
      
                    </div>
                  </div>


                  <hr class="mx-n3">

                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Rating</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <select class="form-select" aria-label="Enabled select example" name="rating" required>
                        <option selected>Choose rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
      
                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Image</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="img" placeholder="Image Url" required/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">
      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Catrgory</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <select class="form-select" aria-label="Enabled select example" name="cat_name" required>
                        <option selected>Choose Category</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Sports Car">Sports Car</option>
                      </select>
                    </div>
                  </div>

                  <hr class="mx-n3">


                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Office Id</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <span id="check_it2">office does not exist</span>
                      <input type="text" class="form-control form-control-lg" name="office_id" onInput="check_office_id(this.value),func2()" placeholder="Enter Office Id" required/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">
      
                  <div class="px-5 py-4">
                    <button id="btn" type="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;">Submit</button>
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
<script>
  
function check_car_plate(data){
    jQuery.ajax({
      url:"ajax/check_if_availible.php",
      data:"plate_id="+data,
      type:"POST",
      dataType:"text",
      success:function(data){
        $("#check_it").html(data);
      },
      error:function(){
       alert('failed');
      }
    })
  }

  function check_office_id(data){
    jQuery.ajax({
      url:"ajax/office_must_be_av.php",
      data:"office_id="+data,
      type:"POST",
      dataType:"text",
      success:function(data){
        $("#check_it2").html(data);
      },
      error:function(){
       alert('failed');
      }
    })
  }

  let plateSpan=document.getElementById("check_it");
  let plateSpan2=document.getElementById("check_it2");
  let btn=document.getElementById("btn");
  btn.setAttribute('disabled','')
  function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }

  function fun(){
    sleep(100).then(() => {  
    if (plateSpan.innerHTML=='Plate Number already exists'){
      btn.setAttribute('disabled','')
     }
     else{
      btn.removeAttribute('disabled');
     }
    })  
  }

  function func2(){
    sleep(100).then(() => {  
    if (plateSpan2.innerHTML=='Office does not exist' || plateSpan2.innerHTML==''){
      btn.setAttribute('disabled','')
     }
     else{
      btn.removeAttribute('disabled');
     }
    })  
  }


</script>
</body>
</html>