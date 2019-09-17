<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="engpage.php">back</a>
<!-- change it to table -->
<?php 
  $sql ="SELECT * FROM users WHERE role ='manager'";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {?>

<h3>Name:                               <?php echo $row['fullname'];?></h3>
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
                         
    
<?php
    }

    }
?>
</body>
</html>