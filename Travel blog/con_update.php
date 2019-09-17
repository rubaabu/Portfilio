<?php 

require_once 'actions/db.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM concerts WHERE concert_id = {$id}" ;
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

   <form action="actions/a_con_update.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
        
           <tr>
               <th>Name</th >
               <td><input  type="text" name="concert_name"  placeholder="concert_name" value="<?php echo $data['concert_name']; ?>"  /></td>
           </tr >     
           <tr>
               <th>Location</th>
               <td><input  type="text" name="concert_location" placeholder="concert_location" value ="<?php echo $data['concert_location']; ?>" /></td >
           </tr>
           <tr>
               <th>Date</th>
               <td><input type="text"  name="eventdate" placeholder ="eventdate" value= "<?php echo $data['eventdate']; ?>" /></td>
           </tr> 
           
           <tr>
               <th>Time</th>
               <td><input  type="text" name="eventtime" placeholder="eventtime" value= "<?php echo $data['eventtime']; ?>" /></td>
           </tr>
           
           <tr>
               <th>Web Address</th>
               <td><input  type="text" name="web_address" placeholder="web_address" value= "<?php echo $data['web_address']; ?>" /></td>
           </tr>
           
           

           <tr>
               <input type= "hidden" name= "concert_id" value= "<?php echo $data['id']; ?>" />
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "event.php"><button  type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >