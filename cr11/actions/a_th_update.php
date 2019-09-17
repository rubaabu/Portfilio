<?php 
require_once 'db.php';

if(isset($_POST)){

   
   $things_name = $_POST['things_name'];
   $things_location = $_POST['things_location'];
   $things_type = $_POST[ 'things_type'];
   $short_description = $_POST['short_description'];
   $web_address = $_POST['web_address'];
   
   $id =$_POST['things_id'];

  

   $sql = 'UPDATE things_to_do SET  things_name = "'.$things_name.'", things_location = "'.$things_location.'", things_type = "'.$things_type.'" , short_description = "'.$short_description.'", web_address = "'.$web_address.'"  WHERE things_id = '.$id ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../th_update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../event.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>