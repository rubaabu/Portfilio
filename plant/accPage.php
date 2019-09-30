<?php
ob_start();
session_start();
require 'db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['manager']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) && !isset($_SESSION['acc']) ) {
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
       header('Location: dealerpage.php');
    $var = $_SESSION['dealer'];

   }else if (isset($_SESSION['manager'])){
    header('Location: managerpage.php');
    $var = $_SESSION['manager'];

} else if(isset($_SESSION['acc'])){
        $var =$_SESSION['acc'];

    } else {
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
   .h1{
      color: #176d81;
      text-align: center;
     
      
   }
</style>

</head>
<body class="body">

<?php require 'nav.php'; ?>
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
                <h3> <strong class="d-inline-block mb-2 text-info">pay Salary</strong></h3>
                
                <div class="mb-1 text-muted small">Nov 12</div>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a class="btn btn-info btn-sm" role="button" href="pay_salary.php">View</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/pay.jpg" style="width: 200px; height: 250px;">
          </div>
        </div>


        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <h3> <strong class="d-inline-block mb-2 text-info">The requests from Dealer</strong></h3>
                
                <div class="mb-1 text-muted small">Nov 12</div>
                <p class="card-text">Every section containts description raw material and the machines in it .</p>
                <a class="btn btn-info btn-sm" role="button" href="requestsDe.php">View</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/request.jpg" style="width: 200px; height: 250px;">
          </div>
        </div>
        </div>


        <div class="row">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <h3> <strong class="d-inline-block mb-2 text-info">Raw Materials</strong></h3>
                
                <div class="mb-1 text-muted small">Nov 12</div>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a class="btn btn-info btn-sm" role="button" href="rawMat.php">View</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/raw.jpg" style="width: 200px; height: 250px;">
          </div>
        </div>


        
        </div>
        </div>




</div>
</div>
<?php require 'footer.php'; ?>

  
</body>
</html>