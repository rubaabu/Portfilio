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
       
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
    
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
  

$request = new DBsetup;
$error = '';



if($_POST['type']==""){
    $error = $request->assembleError($error,"please choose a type","type");
}


if($_POST['message']==""){
    $error = $request->assembleError($error,"please choose a message","message");
}

if($_POST['status']==""){
    $error = $request->assembleError($error,"please choose a status","status");

}
if(!$error){

    $request_data = array(
        'fk_user_from'       =>$var,
        'request_type'       =>$_POST['type'],
        'request_message'    =>$_POST['message'],
        
        'request_status'     =>$_POST['status']
    );

    echo $request->sendRequest($request_data);
 echo "Successfully Inserted new Request";
}
 else {
        echo "Unsuccessful Insertion";
}
echo $error;