<?php 
ob_start();
session_start();
require 'db.php';


if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) ) {
    header("Location: login.php");
    exit;
   }
   
   if(isset($_SESSION['director'])){
       header('Location: directorpage.php');
             $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
        $var = $_SESSION['eng'];

   } else if (isset($_SESSION['dealer'])){
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
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <?php include 'header.php';?>
       <style>
   .body{
       background-color: #d0ecf0
   }
   .ru{
    margin-bottom: 100px;
   }
   .h1{
      color: #176d81;
      text-align: center;
     
      
   }
</style>
   </head>
   <body class="body">
   <?php require 'nav.php' ?>
   <?php
$sql ="SELECT fullname FROM users WHERE user_id=".$var;
$result = mysqli_query($conn,$sql);
if (!$result) { 
   printf("Error: %s\n", mysqli_error($conn));
   exit();
}
  $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);
  ?>
  <h1 class="h1"><?php echo $userRow['fullname']; ?></h1>
<br>


  



<div class="container">
<div class="ru">

      <div class="row">
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3> <strong class="d-inline-block mb-2 text-info">Our repositories</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
               <a class="btn btn-info btn-sm" role="button" href="repository.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/repository.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3> <strong class="d-inline-block mb-2 text-info">Our sections</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">Every section containts description raw material and the machines in it .</p>
               <a class="btn btn-info btn-sm" role="button" href="section.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/sections.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>
      </div>

   <div class="row">
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3> <strong class="d-inline-block mb-2 text-info">Our machines</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
               <a class="btn btn-info btn-sm" role="button" href="machine.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/machine.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>


      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3> <strong class="d-inline-block mb-2 text-info">Our managers</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">Every section containts description raw material and the machines in it .</p>
               <a class="btn btn-info btn-sm" role="button" href="managers.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/manager.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>
      </div>


      <div class="row">
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3> <strong class="d-inline-block mb-2 text-info">The answers from director</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
               <a class="btn btn-info btn-sm" role="button" href="replyDic.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/answerRQ.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>


      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
               <h3><strong class="d-inline-block mb-2 text-info">Requests from the manager</strong></h3>
               
               <div class="mb-1 text-muted small">Nov 12</div>
               <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
               <a class="btn btn-info btn-sm" role="button" href="requestMan.php">View</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/REQUEST.jpg" style="width: 200px; height: 250px;">
         </div>
      </div>
      </div>
    


      </div>

</div>
<?php require 'footer.php'; ?>

   </body>
   </html>