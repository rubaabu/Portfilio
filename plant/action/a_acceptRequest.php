<?php 
require '../db.php';
require '../header.php';

if(isset($_POST)){

    
    
    $request_date        = $_POST['request_date'];
    
    $request_status      = $_POST['request_status'];

    $id =$_POST['request_id'];
?>
      <html>
      <head>
      
      <style>
.body{
        background-color: #d0ecf0
    }
 #ru .container #ru-row #ru-column #ru-box {
    
  margin-top: 50px;
  max-width: 600px;
  height: 100px;
  border: 1px solid #9C9C9C;
  background-color: #176d81;
  margin-bottom: 50px;
 
}
#ru .container #ru-row #ru-column #ru-box #ru-form {
  padding: 20px;
}
#ru .container #ru-row #ru-column #ru-box #ru-form #register-link {
  margin-top: -85px; 
}
    </style>

      </head>
      <body class="body">
      
<?php require '../nav.php'; ?>
<a href="../requests.php"><button type='button' class='btn btn-info'>back</button></a>
    
          
      
<div id="ru">
<div class="container">
<div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">
                

                    <div class="form-group">

<?php
   $sql = "UPDATE requests SET 
           request_date ='$request_date', request_status = '$request_status'  
           WHERE request_id = {$id}" ;

   if($conn->query($sql) === TRUE) {
       echo  "<h3 style=' color: #d8dfe2' class='text-center '>Successfully Updated</h3>";
       echo "<a href='acceptRequest.php?id=" .$id."'><button class='btn btn-info btn-md' type='button'>Back</button> </a>";
       echo  "<a href='../directorpage.php'><button type='button' class='btn btn-info btn-md'>home page</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}
?>
</div>
</div>
</div>
</div>

</div>

</div>


</body>
</html>