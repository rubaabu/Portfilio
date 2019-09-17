<?php 
require_once 'db.php';

if(isset($_POST)){

   
   $restaurant_name = $_POST['restaurant_name'];
   $restaurant_location = $_POST['restaurant_location'];
   $restaurant_type = $_POST[ 'restaurant_type'];
   $restaurant_tel = $_POST['restaurant_tel'];
   $short_description = $_POST['short_description'];
   $web_address = $_POST['web_address'];
   
   $id =$_POST['restaurant_id'];

  

   $sql = "UPDATE restaurants SET  restaurant_name = '$restaurant_name', restaurant_location = '$restaurant_location', restaurant_type = '$restaurant_type' , restaurant_tel ='$restaurant_tel', short_description = '$short_description', web_address ='$web_address'  WHERE restaurant_id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../restaurants.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>