<?php 

session_start();
require 'db.php';


if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) ) {
    header("Location: login.php");
    exit;
   }
   
   if(isset($_SESSION['director'])){
       header('Location: directorpage.php');
             $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
        $var = $_SESSION['eng'];

   } else if (isset($_SESSION['dealer'])){
    header('Location: dealerpage.php');
    $var = $_SESSION['dealer'];

   } else {
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
       <?php include 'header.php';?>
       <title>Engineers page</title>
   </head>
   <body>
   <a class='btn btn-dark'href ="logout.php?logout">Sign out</a><br><br>
   <a class='btn btn-dark' href="repository.php">Repositories</a>
   <a class='btn btn-dark'href="machine.php">Machine</a>
   <a class='btn btn-dark'href="userprofile.php">My profile</a>
   <a class='btn btn-dark'href="managers.php">Managers</a>


<a class='btn btn-dark'href="section.php">Sections</a>

<h3>the Requests</h3>

<?php 
$sql = "SELECT * FROM requests
        JOIN users ON fk_user_from=user_id WHERE role='manager'
        ";
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

<hr>     
   </body>
   </html>