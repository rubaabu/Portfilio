<?php 

require_once '../db.php';

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM q_message WHERE q_message = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
      
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>