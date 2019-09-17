<?php 
require_once 'db.php';

if(isset($_POST)){

   
   $concert_name = $_POST['concert_name'];
   $concert_location = $_POST['concert_location'];
   $eventdate = $_POST[ 'eventdate'];
   $eventtime = $_POST['eventtime'];
   $web_address = $_POST['web_address'];
   
   $id =$_POST['concert_id'];

  

   $sql = 'UPDATE concerts SET  concert_name = "'.$concert_name.'", concert_location = "'.$concert_location.'", eventdate = "'.$eventdate.'" , eventtime = "'.$eventtime.'", web_address = "'.$web_address.'"  WHERE concert_id = '.$id ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../con_update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../event.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>