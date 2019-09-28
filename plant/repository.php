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
 <h2 style="color: #0d3446" >Our repositories</h2><br>


<!-- change it to table -->
<?php 
  $sql ="SELECT * FROM repository
  JOIN users ON fk_user_owner=user_id
  JOIN employees ON fk_employee_id=employee_id
  JOIN products ON fk_product_id=product_id
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

                  <h3>                                     <?php echo $row['repository_name'];?></h3>
                  <span>Description: </span>                    <?php echo $row['repository_description'];?><br>
                  <span>Owner: </span>                          <?php echo $row['fullname'];?><br>
                  <span>employees: </span>                      <?php echo $row['employee_status'];?><br>
                  <span>Products: </span>                       <?php echo $row['product_name'];?><br>
    
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