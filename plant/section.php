<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="directorpage.php">back</a>
<!-- change it to table -->
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

<h3>Name:                                     <?php echo $row['section_name'];?></h3>
<span>Description: </span>                    <?php echo $row['section_description'];?><br>
<span>Raw material: </span>                   <?php echo $row['raw_material_name'];?><br>
<span>employees: </span>                      <?php echo $row['employee_id'];?><br>
<span>Machine: </span>                       <?php echo $row['machine_name'];?><br>
<?php
    }
}

?>
</body>
</html>