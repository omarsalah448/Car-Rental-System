<?php  
// type represents where we got info from
$type = $_REQUEST["type"];
$q = $_REQUEST["q"];
session_start();

if ($type == 'pass'){
    $_SESSION['pass'] = $q;
}
if ($type == 'retype'){
    $_SESSION['retype'] = $q;
}

if ($_SESSION['pass'] == $_SESSION['retype']){
    echo "passwords match";
    // remove from error list
    $_SESSION['errors'] = \array_diff($_SESSION['errors'], ["passwords don't match"]);
}
else {
    echo "passwords don't match";
    array_push($_SESSION['errors'], "passwords don't match");
}
?>