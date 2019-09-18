<?php 
ob_start();
session_start();
require '../function.php';
require '../db.php';

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
        'fk_user_from'          =>$_SESSION['user'],

    );

    echo $employ->employmentApp($employ_data);

}
echo $error;