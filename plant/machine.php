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
 <h2 style="color: #0d3446" >Our machines</h2><br>

<?php 
  $sql ="SELECT * FROM machine
  
";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) { ?>


<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">

          <h3>Name:                                     <?php echo $row['machine_name'];?></h3>
          <span>Description: </span>                    <?php echo $row['machine_description'];?><br>
          <span>Date: </span>                           <?php echo $row['machine_date'];?><br>
          <span>Status: </span>                         <?php echo $row['machine_status'];?><br>

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