<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="engpage.php">back</a>
<!-- change it to table -->
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

<h3>Name:                                     <?php echo $row['machine_name'];?></h3>
<span>Description: </span>                    <?php echo $row['machine_description'];?><br>
<span>Date: </span>                           <?php echo $row['machine_date'];?><br>
<span>Status: </span>                         <?php echo $row['machine_status'];?><br>


<?php
    }
    }
?>

</body>
</html>