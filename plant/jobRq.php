<?php 
require 'db.php';
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
   .body{
       background-color: #d0ecf0
   }
   
</style>

<?php require 'header.php'; ?>

</head>

<body class="body">

<?php require 'nav.php'; ?>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>
    
<a href="hire.php"><button type='button' class='btn btn-info'>Hire</button></a>


<div class="container">
 <h2 style="color: #0d3446" >Job requests</h2><br>
<?php 
$sql = "SELECT * FROM employment_app
        JOIN users ON fk_user_from=user_id
        JOIN employment_type ON fk_type_id=type_id";
       
        $result =mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        if($result->num_rows> 0) {
            while($row = $result->fetch_assoc()) {?>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            
                <span class="card-title">From:</span><?php echo $row['fullname'];?><br>
                <span class="card-text">Type:</span><?php echo $row['type_name'];?><br>
                <span class="card-text">message:</span><?php echo $row['employment_message'];?><br>
            
                <span class="card-text">Date:</span><?php echo $row['employment_date'];?><br>
             
    
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