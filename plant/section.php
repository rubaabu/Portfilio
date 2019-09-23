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
  <h2 style="color: #0d3446">Our sections</h2><br>


<?php 
  $sql ="SELECT * FROM sections
  JOIN users ON fk_user_id=user_id
  JOIN employees ON fk_employee_id=employee_id
  JOIN raw_material ON fk_raw_material_id=raw_material_id
  JOIN machine ON fk_machine=machine_id

";

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

          <h3 class="card-title">              <?php echo $row['section_name'];?></h3>
          <span class="card-text">Description: </span>                    <?php echo $row['section_description'];?><br>
          <span class="card-text">Raw material: </span>                   <?php echo $row['raw_material_name'];?><br>
          <span class="card-text">employees: </span>                      <?php echo $row['employee_id'];?><br>
          <span class="card-text">Machine: </span>                       <?php echo $row['machine_name'];?><br>
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