<?php 
session_start();

require '../function.php';
require '../db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director'])  && !isset($_SESSION['eng']) && !isset($_SESSION['dealer'])) {
    header("Location: login.php");
    exit;
   }
  
   if(isset($_SESSION['director'])){
      header('Location: directorpage.php');
      $var = $_SESSION['director'];

  } else if (isset($_SESSION['eng'])){
       header('Location: engpage.php');
       $var = $_SESSION['eng'];

  }else if (isset($_SESSION['dealer'])){
        header('Location: dealerpage.php');
        $var = $_SESSION['dealer'];

} else {
   
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


$buy = new DBsetup;
$error = '';

if($_POST['message'] == ''){
    $error = $buy->assembleError($error,'Enter your message','message');
}
if($_POST['product_name']==""){
    $error = $buy->assembleError($error,"please choose a product","product_name");
}


if($error==""){

    $buy_order = array(

        'fk_user_from'   =>$_SESSION['user'],
        'buy_message'    =>$_POST['message'],
        
        'product_id'     =>$_POST['product_name']

    );

    echo $buy->userOrder($buy_order);
    echo "Success";
}
 else {
        echo "Unsuccessful Insertion";

} 

echo $error;