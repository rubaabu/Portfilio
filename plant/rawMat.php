<?php

ob_start();
session_start();

require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>

<style  >
 .body{
       background-color: #d0ecf0
   }

  
</style >

</head>
<body class="body">
    

<?php require 'nav.php'; ?>

<a href="accPage.php"><button type='button' class='btn btn-info'>back</button></a>


<div class="container">
 <h2 style="color: #0d3446" >All raw materials</h2><br>


    <?php
    $sql = "SELECT * FROM raw_material";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
        if($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){ ?>

                
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            
                <strong class="card-title" style="color:#176d81"><?php echo $row['raw_material_name'];?></strong><br>  
                <span class="card-text">Date :</span><?php echo $row['raw_material_date'];?><br>
                <span class="card-text">Description:</span><?php echo $row['raw_material_description'];?><br>
                <span class="card-text">Price:</span><?php echo $row['raw_material_price'];?><br>
              

                
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






<div class="container">
 <h2 style="color: #0d3446" >THE raw materials in September</h2><br>


    <?php
    $sql = "SELECT * FROM raw_material
    WHERE raw_material_date < '2019-10-00' AND raw_material_date > '2019-08-00'";
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
        if($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){ ?>

                
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            
                <strong class="card-title" style="color:#176d81"><?php echo $row['raw_material_name'];?></strong><br>  
                <span class="card-text">Date :</span><?php echo $row['raw_material_date'];?><br>
                <span class="card-text">Description:</span><?php echo $row['raw_material_description'];?><br>
                <span class="card-text">Price:</span><?php echo $row['raw_material_price'];?><br>
              

                
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