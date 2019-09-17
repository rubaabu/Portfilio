<?php 
session_start();

require '../function.php';

$buy = new DBsetup;
$error = '';

if($_POST['message'] == ''){
    $error = $buy->assembleError($error,'Enter your message','message');
}



if($error==""){

    $buy_order = array(

        'fk_user_from'   =>2,
        'buy_message'    =>$_POST['message'],
        'buy_date'       =>$_POST['date']

    );

    echo $buy->userOrder($buy_order);


} 

echo $error;