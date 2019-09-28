<?php 
require 'db.php';
ob_start();
session_start();

// if dose not work copy here the sessions
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
   .body{
       background-color: #d0ecf0
   }
   
</style>
    <?php require 'header.php'; ?>
  
</head>
<body class="body">
<?php require 'nav.php'; ?><br>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>

<div class="container">
 <h2 style="color: #0d3446" >Our products</h2><br>

    <?php 
        $sql ="SELECT * FROM products";

        $result=mysqli_query($conn,$sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){ ?>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title"><?php echo $row['product_name'];?></h5>
                <span class="card-text">Quantity:  </span> <?php echo $row['product_quantity']; ?><br>
                <span class="card-text">date:  </span><?php echo  $row['product_date']; ?><br>
                <span class="card-text" type="text">description:  </span><?php echo $row['product_description']; ?><br>
                <span class="card-text" type="text">Price:  </span><?php echo $row['product_price']; ?><br>
                
            </div>
        </div>
                <br>
    </div>
</div>

 <?php
   }
   }
 ?>
</div>
<?php require 'footer.php'; ?>

</body>
</html>