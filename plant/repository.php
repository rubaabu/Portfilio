<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="directorpage.php">back</a>
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

<h3>Name:                                     <?php echo $row['repository_name'];?></h3>
<span>Description: </span>                    <?php echo $row['repository_description'];?><br>
<span>Owner: </span>                          <?php echo $row['fullname'];?><br>
<span>employees: </span>                      <?php echo $row['employee_id'];?><br>
<span>Products: </span>                       <?php echo $row['product_name'];?><br>

<?php
    }
    }
?>

</body>
</html>