<?php 
ob_start();
session_start();
require '../function.php';

$salary = new DBsetup;
$error = '';



if($_POST['fullname']==""){
    $error = $hiring->assembleError($error,"please choose a fullname","fullname");
}


if($_POST['amount']==""){
    $error = $hiring->assembleError($error,"please choose a amount","amount");
}

if($_POST['date']==""){
    $error = $hiring->assembleError($error,"please choose a date","date");
}

if(!$error){

    $salary_data = array(
        'fk_user_from'  =>$_SESSION['user_id'],
        'fk_user_to'    =>$_POST['fullname'],
        'salary_amount' =>$_POST['amount'],
        'salary_date'   =>$_POST['date']
    );

    echo $salary->paysalary($salary_data);

}
echo $error;