<?php 

require_once '../db.php';

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM employees WHERE employee_id = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../employees.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>