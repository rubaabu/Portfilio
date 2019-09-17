<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="directorpage.php">back</a>
<!-- change it to table -->
<?php 
  $sql ="SELECT * FROM employees
  JOIN users ON fk_user_id=user_id";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {?>

<h3>Name:                               <?php echo $row['fullname'];?></h3>
<span>Status: </span>                   <?php echo $row['employee_status'];?><br>
<span>Date: </span>                      <?php echo $row['employee_date'];?><br>
<?php echo " <a href='action/deleteEmp.php?id=" .$row['employee_id']."'><button type='button' class='btn btn-dark'>Delete</button></a>"
  ;?>

    
<?php
    }
}

?>
</body>
</html>