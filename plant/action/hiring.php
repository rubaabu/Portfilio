<?php 
ob_start();
session_start();
require '../db.php';
require '../function.php';
 
$hiring = new DBsetup;
$error = '';

if($_POST['status']==""){
    $error = $hiring->assembleError($error,"please choose a status","status");
}

if($_POST['user']==""){
    $error = $hiring->assembleError($error,"please choose a user","user");
}

if(!$error){

    $hiring_data = array(
        'fk_user_id'    =>$_POST['user'],
        'employee_status' =>$_POST['status']
    );

    echo $hiring->hiring($hiring_data);
    echo "Successfully Inserted employeer";
}
 else {
        echo "Unsuccessful Insertion";
}

echo $error;