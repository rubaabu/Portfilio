<?php 

session_start();
require 'db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) ) {
    header("Location: login.php");
    exit;
    }

   
   
   if(isset($_SESSION['director'])){
     $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
    $var = $_SESSION['dealer'];

   }
   else {
    $var = $_SESSION['user'];

   }

   //select the user that he is logged in
   $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$var);

   //to know what is the proplem if there are one
   if (!$result) { 
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
   $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);
   ?>

<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Dealer page</title>
       <?php require 'header.php'; ?>
   </head>
   <body>
<a href ="logout.php?logout">Sign out</a><br><br>


<h3>the Requests from Engineers</h3>

<?php 
$sql = "SELECT * FROM requests
        JOIN users ON fk_user_from=user_id WHERE user_id='6' ";
        $result =mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        if($result->num_rows> 0) {
            while($row = $result->fetch_assoc()) {?>

                <span>From:</span><?php echo $row['fullname'];?><br>
                <span>Type:</span><?php echo $row['request_type'];?><br>
                <span>message:</span><?php echo $row['request_message'];?><br>
                <span>Date:</span><?php echo $row['request_date'];?><br>

<hr>


<?php
}
}
?>    
  
  <h3>The requests from clients</h3>
  <?php
   
    $sql = "SELECT * FROM buy
    JOIN users ON fk_user_from=user_id";
    $result =mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    if($result->num_rows> 0) {
        while($row = $result->fetch_assoc()) {?>

                <span>From:</span><?php echo $row['fullname'];?><br>
                <span>message:</span><?php echo $row['buy_message'];?><br>
                <span>Date:</span><?php echo $row['buy_date'];?><br>
<hr>
<?php 
        }
    }
    ?>

    <h3>the Questions for viewers</h3>

    <?php
        $sql ="SELECT * FROM q_message";
        $result =mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    if($result->num_rows> 0) {
        while($row = $result->fetch_assoc()) {?>

                <span>Name:</span><?php echo $row['q_message_name'];?><br>
                <span>Email:</span><?php echo $row['q_message_email'];?><br>
                <span>Subject:</span><?php echo $row['q_message_subject'];?><br>
                <span>message:</span><?php echo $row['q_message_message'];?><br>
    <?php echo " <a href='action/deletQM.php?id=" .$row['q_message']."'><button type='button' class='btn btn-dark'>Delete</button></a>"  ;?>

        <?php
         }
        }
        ?>
   </body>
   </html>