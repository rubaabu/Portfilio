<?php 
require '../db.php';
ob_start();
session_start();
require '../function.php';
if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) ) {
    header("Location: login.php");
    exit;
    }


   if(isset($_SESSION['director'])){
      
     $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
        header('Location: engpage.php');
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
    header('Location: dealerpage.php');
    $var = $_SESSION['dealer'];

}
   else {
    header('Location: landingpage.php');

    $var = $_SESSION['user'];

   }

   //select the user that he is logged in
   $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$var);

   //to know what is the proplem if there are one
   if (!$result) { 
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
   $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);
  
$salary = new DBsetup;
$error = '';



if($_POST['fullname']==""){
    $error = $salary->assembleError($error,"please choose a fullname","fullname");
}


if($_POST['amount']==""){
    $error = $salary->assembleError($error,"please choose a amount","amount");
}

if($_POST['date']==""){
    $error = $salary->assembleError($error,"please choose a date","date");

}
if(!$error){

    $salary_data = array(
        'fk_user_from'  =>$_SESSION['director'],
        'fk_user_to'    =>$_POST['fullname'],
        'salary_amount' =>$_POST['amount'],
        'salary_date'   =>$_POST['date']
    );

    echo $salary->paysalary($salary_data);

}
echo $error;