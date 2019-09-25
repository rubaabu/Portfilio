<?php 
require '../db.php';
ob_start();
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM requests WHERE request_id={$id}";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
    $conn->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <?php require '../header.php'; ?>

       <style>
.body{
        background-color: #d0ecf0
    }
 #ru .container #ru-row #ru-column #ru-box {
    
  margin-top: 50px;
  max-width: 600px;
  height: 550px;
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
         
                          <form id="ru-form" class="form" method="post" action="a_acceptRequest.php">
                         <h3 style=" color: #d8dfe2" class="text-center ">Accept requests</h3>

                <div class="form-group">
                <label for="request_type"style=" color: #d8dfe2" >Type</label>
                    <select class="form-control" name="request_type" value="<?php echo $data['request_type'];?>">
                    <option value="buy" >buy</option>
                    <option value="sale" >sale</option>
                    <option value="pay" >pay</option>

                    </select>
               
                </div>

                <div class="form-group">
                <label for="request_message">Message</label>
                    <input class="form-control" type="text" name="request_message" value="<?php echo $data['request_message'] ?>">
                    <div class="form-group">
                <label for="request_date">Date:</label>
                    <input class="form-control" type="date" name="request_date" value="<?php echo $data['request_date'] ?>">
                </div>
                   

                    <div class="form-group">
                <label for="request_from">From</label>
                     <input class="form-control" type="text" name="request_from" value="<?php echo $data['fk_user_from'] ?>">
                </div>
                    

                     <div class="form-group">
                <label  for="request_status">Status</label>
                <select  class="form-control" name="request_status" value="<?php echo $data['request_status']; ?>" >
                    <option value="Open" >Open</option>
                    <option value="Accepted" >Accepted</option>
                    <option value="Dismissed" >Dismissed</option>

                    </select><br >
                </div>
                   

                    <div class="form-group">
               <input type= "hidden" name= "request_id" class="btn btn-info btn-md" value= "<?php echo $data['request_id']?>" />
               <button  type= "submit" class="btn btn-info btn-md" >Save Changes</button >
               </div>
              
              
          
               </div>
               </div>
               </div>
               </div>
               </div>


            </form>
    <?php require '../footer.php'; ?>
            
    </body>
    </html>



    <?php
}
?>