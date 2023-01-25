<?php
session_start();
include('../connect.php');
if($_REQUEST['type'] == 'reserve'){
    // reservation handling
    $plate_id = $_SESSION['plate_id'];
    $customer_id = $_SESSION['customer_id'];
    $pickup_date = date("Y-m-d H-i-s");
    $sql = "INSERT INTO reserve (plate_id, customer_id, pickup_date, payment, is_rented) ";
    $sql .= "VALUES('$plate_id', '$customer_id',' $pickup_date', 'cash', 1)";
    mysqli_query($conn, $sql);
    $sql = "UPDATE car SET status='Rented' WHERE plate_id='$plate_id';";
    if (mysqli_query($conn, $sql)){
        header('Location: ../profile.php');
    }
    else{
        header('Location: ../reservation.php');
    }
}
?>




<!-- </div><br>
              
              <button onclick="window.location='ajax/ajaxHandler.php?type=reserve&ok='+'<?php echo $res[0]['rating'] ;?>'" type="submit">Reserve</button>
              
            </div>
      </div>
      <div>
      </div>
      </div>
    </div><br><br>
    <!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> --> 