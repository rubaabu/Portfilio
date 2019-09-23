<?php 
require 'db.php';
ob_start();
session_start();
?>
<html>
<head>
<?php require 'header.php'; ?>

<style>
   .body{
       background-color: #d0ecf0
   }
   
</style>

</head>
<body class="body">

<?php require 'nav.php'; ?>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>


<div class="container">
 <h2 style="color: #0d3446" >All users</h2><br>

<?php 
  $sql ="SELECT * FROM users";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {?>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            
            <h3 style="color: #176d81" class="card-title">Fullname:   <?php echo $row['fullname'];?></h3>
            <span class="card-text">the date of birth: </span>        <?php echo $row['date_of_birth'];?><br>
            <span class="card-text">Email address: </span>            <?php echo $row['email'];?><br>
            <span class="card-text">password: </span>                 <?php echo $row['password'];?><br>
            <span class="card-text">Telefon number:                   <?php echo $row['telefon'];?><br>
            <span class="card-text">Address: </span>                  <?php echo $row['address'];?><br>
            <span class="card-text">Gender: </span>                   <?php echo $row['gender'];?><br>
            <span class="card-text">Status: </span>                   <?php echo $row['status'];?><br>
            <span class="card-text">Children: </span>                 <?php echo $row['children'];?><br>
            <span class="card-text">Nationality: </span>              <?php echo $row['nationality'];?><br>
            <span class="card-text">Education: </span>                <?php echo $row['education'];?><br>
            <span class="card-text">Date of start: </span>            <?php echo $row['date_of_start'];?><br>
            <span class="card-text">The role in the factory: </span>  <?php echo $row['role'];?><br>

        
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