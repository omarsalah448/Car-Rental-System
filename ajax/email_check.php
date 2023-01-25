<?php 
include("../connect.php");
// check if email already exists
session_start();

$emailPattern = "/\S+@\S+\.\S+/";
$email = $_REQUEST['q'];
$sql = "SELECT customer_id FROM customer 
WHERE email = '$email'
UNION 
SELECT admin_id FROM admin
WHERE email = '$email';";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($res){
    echo 'Email already exists !';
    array_push($_SESSION['errors'], 'Email already exists !');
}
else{
    // remove from error list
    $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Email already exists !']);
}
if (preg_match($emailPattern, $email) != 1 ){
    echo "Not a valid Email form";
    array_push($_SESSION['errors'], 'Not a valid Email form');
}
else{
    // remove from error list
    $_SESSION['errors'] = \array_diff($_SESSION['errors'], ['Not a valid Email form']);
}
?>