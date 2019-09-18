<?php 
require '../db.php';

if(isset($_POST)){

   $request_status = $_POST['request_status'];
   $id =$_POST['request_id'];

  

   $sql = "UPDATE requests SET  request_status = '$request_status'  WHERE request_id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='acceptRequested.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../directorpage.php'><button type='button'>page</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>