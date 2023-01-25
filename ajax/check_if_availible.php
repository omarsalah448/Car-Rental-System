<?php
include('../connect.php');
if(!empty($_POST['plate_id'])){
    $sql = "SELECT plate_id FROM car WHERE plate_id='" .$_POST['plate_id']. "'";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if ($result){
        echo "Plate Number already exists";
    }
    else
    {
        echo "";
    }
}
?>