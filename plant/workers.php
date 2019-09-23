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
<?php require 'nav.php'; ?><br>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>

<div class="container">
 <h2 style="color: #0d3446" >Our workers</h2><br>
<!-- change it to table -->
<?php 
  $sql ="SELECT * FROM users WHERE fullname='Worker'";
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
                <h3>                                    <?php echo $row['fullname'];?></h3>
                <span>the date of birth: </span>        <?php echo $row['date_of_birth'];?><br>
                <span>Email address: </span>            <?php echo $row['email'];?><br>
                <span>password: </span>                 <?php echo $row['password'];?><br>
                <span>Telefon number:                   <?php echo $row['telefon'];?><br>
                <span>Address: </span>                  <?php echo $row['address'];?><br>
                <span>Gender: </span>                   <?php echo $row['gender'];?><br>
                <span>Status:                           <?php echo $row['status'];?><br>
                <span>Children: </span>                 <?php echo $row['children'];?><br>
                <span>Nationality: </span>              <?php echo $row['nationality'];?><br>
                <span>Education: </span>                <?php echo $row['education'];?><br>
                <span>Date of start: </span>            <?php echo $row['date_of_start'];?><br>
                <span>The role in the factory: </span>  <?php echo $row['role'];?><br>
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