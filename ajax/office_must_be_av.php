<?php
include('../connect.php');
if(!empty($_POST['office_id'])){
    $sql = "SELECT office_id FROM offices WHERE office_id='" .$_POST['office_id']. "'";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if ($result){
        echo "office exists";
    }
    else
    {
        echo "Office does not exist";
    }
}
?>