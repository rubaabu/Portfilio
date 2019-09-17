<?php 

session_start();
require 'db.php';

// if (!isset($_SESSION['role'])) {
//   header('Location: login.php');
// } else if ($_SESSION['role'] == 'user') {
//   header('Location: landingpage.php');
// } else if ($_SESSION['role'] == 'dealer') {
//   header('Location: dealerpage.php');
// }

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) ) {
    header("Location: login.php");
    exit;
   }
   
   if(isset($_SESSION['director'])){
     $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
    $var = $_SESSION['eng'];

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
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Engineers page</title>
   </head>
   <body>
<a href ="logout.php?logout">Sign out</a><br><br>
<p>I am an engineer :)</p>       
   </body>
   </html>