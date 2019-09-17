<?php 

require_once 'actions/db.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM things_to_do WHERE things_id = {$id}" ;
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
   <legend>Update thing</legend>

   <form action="actions/a_th_update.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
        
           <tr>
               <th>Name</th >
               <td><input  type="text" name="things_name"  placeholder="things_name" value="<?php echo $data['things_name']; ?>"  /></td>
           </tr >     
           <tr>
               <th>Location</th>
               <td><input  type="text" name="things_location" placeholder="things_location" value ="<?php echo $data['things_location']; ?>" /></td >
           </tr>
           <tr>
               <th>Type</th>
               <td><input type="text"  name="things_type" placeholder ="things_type" value= "<?php echo $data['things_type']; ?>" /></td>
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
               <input type= "hidden" name= "things_id" value= "<?php echo $data['id']; ?>" />
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "event.php"><button  type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >
