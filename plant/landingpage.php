<?php
ob_start();
session_start();
require 'db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director'])  && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) && !isset($_SESSION['acc'])) {
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

}else if (isset($_SESSION['acc'])){
    header('Location: accPage.php');
    $var = $_SESSION['acc'];

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



   <html>
   <head>
<?php require 'header.php'; ?>  
<style>
   .body{
       background-color: #d0ecf0
   }
   .h1{
      color: #176d81;
      text-align: center;
     
      
   }
</style>
   </head>
   <body class="body">
<?php require 'nav.php'; ?><br> 

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

    <form action="action/buy.php" method="get">
        <h3 style=" color: #176d81" class="text-left ">Our products</h3>
        <br>
    <?php 
        $sql ="SELECT * FROM products";

        $result=mysqli_query($conn,$sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){ ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">

                <div class="card-body flex-column align-items-start">
            

                    <h4 class="d-inline-block mb-2 text-info" style="color: #0d3446"><?php echo $row['product_name'];?></h4><br>
                    <span class="card-text">Quantity: </span> <?php echo $row['product_quantity']; ?><br>
                    <span class="card-text">date: </span><?php echo  $row['product_date']; ?><br>
                    <span class="card-text">description: </span><?php echo $row['product_description']; ?><br>
                    <span class="card-text" style=" color: #176d81" type="text">Price:  </span><?php echo $row['product_price']; ?><br>

                    
                <br>
                    <a href='buy.php'><button type='button' class='btn btn-info'>Buy a product</button></a>
                    
            
                </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="img/product.jpg" style="width: 200px; height: 250px;">
                
            </div>
                <br>
        </div>
    </div>

<?php
}
}
?> 

    </form>

            <?php 
           $result->free();
           ?>

</div>
<?php require 'footer.php'; ?>

</body>
   </html>
   
