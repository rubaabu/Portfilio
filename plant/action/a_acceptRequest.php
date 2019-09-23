<?php 
require '../db.php';

if(isset($_POST)){

    $request_type   	 = $_POST['request_type'];
    $request_message     = $_POST['request_message'];
    $request_date        = $_POST['request_date'];
    $request_from        = $_POST['request_from'];
    $request_status      = $_POST['request_status'];

    $id =$_POST['request_id'];

  

   $sql = "UPDATE requests SET request_type='$request_type', request_message ='$request_message', 
           request_date ='$request_date', fk_user_from ='$request_from', request_status = '$request_status'  
           WHERE request_id = {$id}" ;

   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='acceptRequest.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../directorpage.php'><button type='button'>page</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>