<!DOCTYPE html>
<html>
<head>
   <title></title>



   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </ style>

</head>
<body>

<fieldset >
   <legend>Add restaurant</legend>

   <form  action="actions/a_create.php" method= "post">

       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="restaurant_name"  placeholder="restaurant_name" /></td >
           </tr>     
           <tr>
               <th>Location</th>
               <td><input  type="text" name="restaurant_location" placeholder="restaurant_location" /></td>
           </tr>
           <tr>
               <th>Type</th>
               <td>< input type="text"  name="restaurant_type" placeholder ="restaurant_type" /></td>
           </tr>
           <tr>
               <th>Short description </th>
               <td><input  type="text" name="short_description" placeholder="short_description" /></td>
           </tr>
           <tr>
               <th>TEL</th>
               <td><input  type="text" name="restaurant_tel" placeholder="restaurant_tel" /></td>
           </tr>
           <tr>
               <th>Web address </th>
               <td><input  type="text" name="web_address" placeholder="web_address" /></td>
           </tr>
           <tr>
               <th>Image </th>
               <td><input  type="text" name="image" placeholder="image" /></td>
           </tr>
           <tr> 
               <td><button type ="submit">Insert Restaurant</button></td>
               <td ><a href= "home.php"><button  type="button">Back</ button></a></td>
           </tr >
       </table>
   </form>

</fieldset >

</body>
</html>