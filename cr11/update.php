<?php 

require_once 'actions/db.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM restaurants WHERE restaurant_id = {$id}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
   <title >Edit</title>

   <style type= "text/css">
       fieldset {
           margin : auto;
           margin-top: 100px;
            width: 50%;
       }

       table  tr th {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset>
   <legend>Update RESTAURANT</legend>

   <form action="actions/a_update.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
        
           <tr>
               <th>Name</th >
               <td><input  type="text" name="restaurant_name"  placeholder="restaurant_name" value="<?php echo $data['restaurant_name']; ?>"  /></td>
           </tr >     
           <tr>
               <th>Location</th>
               <td><input  type="text" name="restaurant_location" placeholder="restaurant_location" value ="<?php echo $data['restaurant_location']; ?>" /></td >
           </tr>
           <tr>
               <th>Type</th>
               <td><input type="text"  name="restaurant_type" placeholder ="restaurant_type" value= "<?php echo $data['restaurant_type']; ?>" /></td>
           </tr> 
           <tr>
               <th>TEL </th>
               <td><input  type="text" name="restaurant_tel" placeholder="restaurant_tel" value= "<?php echo $data['restaurant_tel']; ?>" /></td>
           </tr>
           <tr>
               <th>short description </th>
               <td><input  type="text" name="short_description" placeholder="short_description" value= "<?php echo $data['short_description']; ?>" /></td>
           </tr>
           
           <tr>
               <th>Web Address</th>
               <td><input  type="text" name="web_address" placeholder="web_address" value= "<?php echo $data['web_address']; ?>" /></td>
           </tr>
           
           

           <tr>
               <input type= "hidden" name= "restaurant_id" value= "<?php echo $data['restaurant_id']; ?>" />
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "restaurants.php"><button  type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >
