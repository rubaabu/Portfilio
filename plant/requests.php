<?php
require 'db.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
 <h2 style="color: #0d3446" >The requests</h2><br>

<?php 
$sql = "SELECT * FROM requests
        JOIN users ON fk_user_from=user_id
        ";
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

                <span class="card-title"><b style=" color: #176d81"></span><?php echo $row['fullname'];?></b><br>
                <span class="card-text">Type:</span><?php echo $row['request_type'];?><br>
                <span class="card-text">message:</span><?php echo $row['request_message'];?><br>
                <span class="card-text">Date:</span><?php echo $row['request_date'];?><br>
                <span class="card-text">Status:</span><?php echo $row['request_status'];?><br><br>
                <?php echo "
                <a href='action/acceptRequest.php?id=" .$row['request_id']."'><button type='button' class='btn btn-info'>Reply</button></a>"
                  ;  ?>
                 
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
