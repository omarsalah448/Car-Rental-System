<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Car</title>
</head>
<?php                     
  //On page 2
  $car['plate_id']= $_POST['submit'];
  include('connect.php');
  $id=$car['plate_id'];
  $sql1 = "SELECT brand FROM car WHERE plate_id='$id';";
  $sql2 = "SELECT model FROM car WHERE plate_id='$id';";
  $sql3 = "SELECT year FROM car WHERE plate_id='$id';";
  $sql4 = "SELECT color FROM car WHERE plate_id='$id';";
  $sql5 = "SELECT status FROM car WHERE plate_id='$id';";
  $sql6 = "SELECT rating FROM car WHERE plate_id='$id';";
  $sql7 = "SELECT img FROM car WHERE plate_id='$id';";
  $sql8 = "SELECT office_id FROM car WHERE plate_id='$id';";
  $sql9 = "SELECT cat_name FROM car WHERE plate_id='$id';";
  $sql10 = "SELECT plate_id FROM car WHERE plate_id='$id';";
  $res1 = mysqli_query($conn,$sql1);
  $res2 = mysqli_query($conn,$sql2);
  $res3 = mysqli_query($conn,$sql3);
  $res4 = mysqli_query($conn,$sql4);
  $res5 = mysqli_query($conn,$sql5);
  $res6 = mysqli_query($conn,$sql6);
  $res7 = mysqli_query($conn,$sql7);
  $res8 = mysqli_query($conn,$sql8);
  $res9 = mysqli_query($conn,$sql9);
  $res10 = mysqli_query($conn,$sql10);
  $result1 = mysqli_fetch_all($res1, MYSQLI_ASSOC);
  $result2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
  $result3 = mysqli_fetch_all($res3, MYSQLI_ASSOC);
  $result4 = mysqli_fetch_all($res4, MYSQLI_ASSOC);
  $result5 = mysqli_fetch_all($res5, MYSQLI_ASSOC);
  $result6 = mysqli_fetch_all($res6, MYSQLI_ASSOC);
  $result7 = mysqli_fetch_all($res7, MYSQLI_ASSOC);
  $result8 = mysqli_fetch_all($res8, MYSQLI_ASSOC);
  $result9 = mysqli_fetch_all($res9, MYSQLI_ASSOC);
  $result10 = mysqli_fetch_all($res10, MYSQLI_ASSOC);
  $x= $car['plate_id'];
  //On page 1
  $_SESSION['varname'] = $x;
?>
<body>
        <?php
        include('header2.php');
        ?>

    <section class="vh-100" style="background-color: darkmagenta;">
        <div class="container">
        <form action="adderFiles/addNewCar.php" method="POST">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <br>
              <h1 class="text-white mb-4">Edit Car</h1>
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body">
      
                  <div class="row align-items-center pt-4 pb-3">
                  <form action="adderFiles/addNewCar.php" method="POST">

                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Brand</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" placeholder="<?php foreach ($result1 as $m){ ?><?php echo $m['brand'];} ?>" disabled/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
            
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Model</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" placeholder="<?php foreach ($result2 as $m){ ?><?php echo $m['model'];} ?>"disabled/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">


      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Year</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <select class="form-select" aria-label="Enabled select example" disabled>
                        <option selected><?php foreach ($result3 as $m){ ?><?php echo $m['year'];} ?></option>
                        <option value="1">2022</option>
                        <option value="2">2021</option>
                        <option value="3">2020</option>
                        <option value="2">2019</option>
                        <option value="3">2018</option>
                        <option value="2">2017</option>
                        <option value="3">2016</option>
                      </select>
                    </div>
                  </div>
      
                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Plate Number</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" placeholder="<?php foreach ($result10 as $m){ ?><?php echo $m['plate_id'];} ?>" required disabled/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Color</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" placeholder="<?php foreach ($result4 as $m){ ?><?php echo $m['color'];} ?>" required disabled/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Status</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                        <div class="form-check">
                            <input type="radio" name="status" id="flexRadioDefault1" style="accent-color: darkmagenta;" value="out of service">
                            <label class="form-check-label" for="flexRadioDefault1">
                              out of service
                            </label>
                          </div>
                          <div class="form-check">
                            <input type="radio" name="status" id="flexRadioDefault2" style="accent-color: darkmagenta;" value="Active" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Active
                            </label>
                          </div>
      
                    </div>
                  </div>
                  <hr class="mx-n3">
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Rating</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <select class="form-select" aria-label="Enabled select example" name="rating">
                        <option selected><?php foreach ($result6 as $m){ ?><?php echo $m['rating'];} ?></option>
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
      
                      <input type="text" class="form-control form-control-lg" disabled placeholder="<?php foreach ($result7 as $m){ ?><?php echo $m['img'];} ?>" required/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">
      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Catrgory</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <select class="form-select" aria-label="Enabled select example" disabled>
                        <option selected><?php foreach ($result9 as $m){ ?><?php echo $m['cat_name'];} ?></option>
                        <option value="1">Coupe</option>
                        <option value="2">Sedan</option>
                        <option value="3">SUV</option>
                        <option value="2">Hatchback</option>
                        <option value="3">Sports Car</option>
                      </select>
                    </div>
                  </div>

                  <hr class="mx-n3">


                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Office Id</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <span id="check_it2"></span>
                      <input type="text" name="office_id" class="form-control form-control-lg" onInput="check_office_id(this.value),fun2()" value="<?php foreach ($result8 as $m){ ?><?php echo $m['office_id'];} ?>" required/>
      
                    </div>
                  </div>

                  <hr class="mx-n3">
      
                  <div class="px-5 py-4">
                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" id="btn">Submit</button>
                  </div>  
                  </form>    
                        <form action="deleteFiles/deletCar.php" method="POST">
                       <button type="submit" style="background-color: red; float: right; margin-bottom: 25px; margin-right: 20px;" name="submit3" class="btn btn-primary btn-lg" style="background-color: darkmagenta;;" id="btn" value="<?php foreach ($result10 as $m){ ?><?php echo $m['plate_id'];} ?>">Delete car</button>
                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
        <br>
      </div>

      </section>
<script>
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

  let plateSpan2=document.getElementById("check_it2");
  let btn=document.getElementById("btn");
  plateSpan2.innerHTML='Office exists';
  function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
   }

  function fun2(){
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


