<?php 
require 'db.php';
ob_start();
session_start();
?>
<html>

<head>
<style>
.body{
  background-color: #d0ecf0
}
</style>
    <?php require 'header.php'; ?>

</head>

<body class="body">
<?php require 'nav.php'; ?><br>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>
 

<div class="container">
 <h2 >The questions from viewers</h2><br>


  <?php 
    $sql ="SELECT * FROM q_message";

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

              <h3 class="card-title">Name:                               <?php echo $row['q_message_name'];?></h3>
              <span class="card-text">Email: </span>                     <?php echo $row['q_message_email'];?><br>
              <span class="card-text">Subject: </span>                   <?php echo $row['q_message_subject'];?><br>
              <span class="card-text">Message: </span>                   <?php echo $row['q_message_message'];?><br>
              <span class="card-text">Date: </span>                      <?php echo $row['q_date'];?><br>
              <?php echo " <a href='action/deletQM.php?id=" .$row['q_message']."'><button type='button' class='btn btn-info'>Delete</button></a>"  ;?>
    
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