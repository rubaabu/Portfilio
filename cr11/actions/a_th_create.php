<?php 

require_once 'db.php';

if ($_POST) {
   
   $things_name             = $_POST['things_name'];
   $things_location          = $_POST['things_location'];
   $things_type              = $_POST['things_type'];
   
   $short_description       = $_POST['short_description'];
   
   $web_address         = $_POST['web_address'];
   
   


   $sql1 = "INSERT INTO things_to_do(things_name, things_location, things_type, short_description, web_address) 
           VALUES ('$things_name', '$things_location', '$things_type', '$short_description','$web_address')";
    if($conn->query($sql1) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../event.php'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql1 . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>