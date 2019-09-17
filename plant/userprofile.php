<?php 
ob_start();
session_start();

require 'db.php';
?>

<html>
<head>
<?php include 'header.php'; ?>
</head>
<body>

  <a class='btn btn-dark' href="logout.php?logout">logout</a>
<hr>
<div class="container">
  <?php
  if(isset($_SESSION['user'])){
    $var = $_SESSION['user'];

  } else if(isset($_SESSION['director'])){
    $var = $_SESSION['director'];

  } else if(isset($_SESSION['dealer'])){
    $var = $_SESSION['dealer'];

  } else if($_SESSION['eng']){
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

          <h4>Fullname:<?php echo $row['fullname'];?></h4>
          <h4>date of birth: <?php echo $row['date_of_birth'];?></h4>
          <h4>Email: <?php echo $row['email'];?></h4>
          <h4>Telefon: <?php echo $row['telefon'];?></h4>
          <h4>Address: <?php echo $row['address'];?></h4>
          <h4>Gender: <?php echo $row['gender'];?></h4>
          <h4>Status: <?php echo $row['status'];?></h4>
          <h4>Children: <?php echo $row['children'];?></h4>
          <h4>Nationality: <?php echo $row['nationality'];?></h4>
          <h4>Education: <?php echo $row['education'];?></h4>
          <h4>Date of start: <?php echo $row['date_of_start'];?></h4>


            <a class='btn btn-dark' href="landingpage.php">back</a>


  
  <?php 
}
}

  ?>
  
  </div>

</body>
</html>
