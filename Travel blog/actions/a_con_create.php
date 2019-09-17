<?php 

require_once 'db.php';

if ($_POST) {
   
   $concert_name          = $_POST['concert_name'];
   $concert_location      = $_POST['concert_location'];
   $eventdate             = $_POST['eventdate'];
   $eventtime             = $_POST['eventtime'];
   $web_address           = $_POST['web_address'];
   $price                 = $_POST['price'];
   


   $sql2 = "INSERT INTO concerts (concert_name, concert_location, eventdate, eventtime, web_address, price) 
           VALUES ('$concert_name', '$concert_location', '$eventdate','$eventtime','$web_address','$price')";

    if($conn->query($sql2) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
     
        echo "<a href='../home.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql2 . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>