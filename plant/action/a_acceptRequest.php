<?php 
require '../db.php';
require '../header.php';

if(isset($_POST)){


    
    $request_status      = $_POST['request_status'];

    $id =$_POST['request_id'];

     
 


  if( $conn->query ( "UPDATE requests SET 
            request_status = '$request_status'  
           WHERE request_id = {$id}")){
              echo "<div  style=' color: #d8dfe2;'>Successfully updated</div>";
           }else {
            echo "Unsuccessful Insertion";
    }


   $conn->close();

}
?>

