<?php 
ob_start();
session_start();
require '../function.php';

$employ = new DBsetup;
$error = '';

if($_POST['type']==""){
    $error = $employ->assembleError($error,"please choose a type","type");
}

if($_POST['message']==""){
    $error = $employ->assembleError($error,"please Write your message","message");
}

if($_POST['file']==""){
    $error = $employ->assembleError($error,"please choose a file","file");
}

if(!$error){

    $employ_data = array(
    
        'fk_type_id'            =>$_POST['type'],
        'employment_message'    =>$_POST['message'],
        'employment_file'       =>$_POST['file'],
        'fk_user_from'          =>2,

    );

    echo $employ->employmentApp($employ_data);

}
echo $error;