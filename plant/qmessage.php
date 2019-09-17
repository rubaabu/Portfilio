<?php 
require 'db.php';
?>
<html>
<head><?php require 'header.php'; ?></head>
<body>
<a href="directorpage.php">back</a>
<!-- change it to table -->
<?php 
  $sql ="SELECT * FROM q_message";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {?>

<h3>Name:                                     <?php echo $row['q_message_name'];?></h3>
<span>Email: </span>                          <?php echo $row['q_message_email'];?><br>
<span>Subject: </span>                       <?php echo $row['q_message_subject'];?><br>
<span>Message: </span>                      <?php echo $row['q_message_message'];?><br>
<?php
    }
}

?>
</body>
</html>