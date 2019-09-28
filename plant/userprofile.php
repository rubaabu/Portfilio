<?php 
ob_start();
session_start();

require 'db.php';
?>

<html>
<head>
<style>
   .body{
       background-color: #d0ecf0
   }
   
</style>
<?php include 'header.php'; ?>
</head>
<body class="body">
<?php require 'nav.php'; ?>


<br>


<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>


<div class="container">
  <?php
  if(isset($_SESSION['user'])){
    $var = $_SESSION['user'];

  } else if(isset($_SESSION['director'])){
    $var = $_SESSION['director'];

  } else if(isset($_SESSION['dealer'])){
    $var = $_SESSION['dealer'];

  } else if(isset($_SESSION['acc'])){
    $var = $_SESSION['acc'];

  } else if(isset($_SESSION['eng'])){
    $var = $_SESSION['eng'];

  } else if($_SESSION['manager']){
    $var = $_SESSION['manager'];

  } else if($_SESSION['acc']){
    $var = $_SESSION['acc'];

  } else if($_SESSION['tech']){
    $var = $_SESSION['tech'];

  }

    $sql = "SELECT * FROM users WHERE user_id=".$var;
    $result = mysqli_query($conn,$sql);

      if (!$result) { 
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }

      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>

  
   
  


      <div class="card">

        <div class="card-header">
          <h4 style="color: #0d3446; text-align: center;"><b><?php echo $row['fullname'];?></b></h4>
        </div>
          <ul class="list-group list-group-flush">

          <li class="list-group-item">date of birth: <?php echo $row['date_of_birth'];?></li>
          <li class="list-group-item">Email: <?php echo $row['email'];?></li>
          <li class="list-group-item">Telefon: <?php echo $row['telefon'];?></li>
          <li class="list-group-item">Address: <?php echo $row['address'];?></li>
          <li class="list-group-item">Gender: <?php echo $row['gender'];?></li>
          <li class="list-group-item">Status: <?php echo $row['status'];?></li>
          <li class="list-group-item">Children: <?php echo $row['children'];?></li>
          <li class="list-group-item">Nationality: <?php echo $row['nationality'];?></li>
          <li class="list-group-item">Education: <?php echo $row['education'];?></li>
          <li class="list-group-item">Date of start: <?php echo $row['date_of_start'];?></li>

          </ul>

      </div>   


  
  <?php 
}
}

  ?>
  
  </div>
  <br>
  <?php require 'footer.php'; ?>

</body>
</html>
