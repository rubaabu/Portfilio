<?php 
ob_start();
session_start();
require 'db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) ) {
    header("Location: login.php");
    exit;
    }

   
   
   if(isset($_SESSION['director'])){
     $var = $_SESSION['director'];
     header('Location: directorpage.php');


   } else if (isset($_SESSION['eng'])){
       header('Location: engpage.php');
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
    $var = $_SESSION['dealer'];

   }
   else {
    $var = $_SESSION['user'];
    header('Location: landingpage.php');


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
      
       <?php require 'header.php'; ?>

       <style>
   .body{
       background-color: #d0ecf0
   }

   .ru{
    margin-bottom: 360px;
   }
   
</style>

   </head>
   <body class="body">

<?php require 'nav.php'; ?>
<br >
<div class="container">
<div class="ru">

  <div class="row">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <h3> <strong class="d-inline-block mb-2 text-info">the Requests from Engineers</strong></h3>
                
                <div class="mb-1 text-muted small">Nov 12</div>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a class="btn btn-info btn-sm" role="button" href="requestsEng.php">View</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/request.jpg" style="width: 200px; height: 250px;">
          </div>
        </div>


        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <h3> <strong class="d-inline-block mb-2 text-info">The requests from clients</strong></h3>
                
                <div class="mb-1 text-muted small">Nov 12</div>
                <p class="card-text">Every section containts description raw material and the machines in it .</p>
                <a class="btn btn-info btn-sm" role="button" href="orders.php">View</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/request.jpg" style="width: 200px; height: 250px;">
          </div>
        </div>
        </div>

   

        </div>

        </div>
<?php require 'footer.php'; ?>

   </body>
   </html>