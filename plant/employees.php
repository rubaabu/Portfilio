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
<?php require 'nav.php'; ?>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>


<div class="container">
 <h2 style="color: #0d3446" >All employees</h2><br>

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

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                          
              <h3 style="color: #176d81" class="card-title">Name:        <?php echo $row['fullname'];?></h3>
              <span class="card-text">Status: </span>                    <?php echo $row['employee_status'];?><br>
              <span class="card-text">Date: </span>                      <?php echo $row['employee_date'];?><br>
              <?php echo " <a href='action/deleteEmp.php?id=" .$row['employee_id']."'><button type='button' class='btn btn-info'>Delete</button></a>"
                ;?>

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