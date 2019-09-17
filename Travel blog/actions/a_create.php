<?php 

require_once 'db.php';

if ($_POST) {
   
   $restaurant_name             = $_POST['restaurant_name'];
   $restaurant_location            = $_POST['restaurant_location'];
   $restaurant_type              = $_POST['restaurant_type'];
   $restaurant_tel      = $_POST['restaurant_tel'];
   $short_description = $_POST['short_description'];
   
   $web_address         = $_POST['web_address'];
   
   


   $sql = "INSERT INTO restaurants (restaurant_name, restaurant_location, restaurant_type, short_description, restaurant_tel, web_address) 
           VALUES ('$restaurant_name', '$restaurant_location', '$restaurant_type', '$short_description','$restaurant_tel','$web_address')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../restaurants.php'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}





?>