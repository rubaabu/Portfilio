<?php 
require '../db.php';
ob_start();
session_start();



if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) ) {
    header("Location: login.php");
    exit;
    }


   if(isset($_SESSION['director'])){
      
     $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
        
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
    
    $var = $_SESSION['dealer'];

}
  

   //select the user that he is logged in
   $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$var);

   //to know what is the proplem if there are one
   if (!$result) { 
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
   $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);




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


<?php if(isset($_SESSION['director'])){?>
    <a href="../requests.php"><button type='button' class='btn btn-info'>back</button></a>
<?php }
?>

<?php if(isset($_SESSION['dealer'])){?>
    <a href="../requestsEng.php"><button type='button' class='btn btn-info'>back</button></a>
<?php }
?>


<?php if(isset($_SESSION['eng'])){?>
    <a href="../requestMan.php"><button type='button' class='btn btn-info'>back</button></a>
<?php }
?>
    
<div id="ru">
 <div class="container">
  
     
            <div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">
         
                          <form id="myForm" class="form" method="post" action="a_acceptRequest.php">
                         <h3 style=" color: #d8dfe2" class="text-center ">Respond to the requests</h3>

                <div class="form-group">
                <label style=" color: #d8dfe2; " for="request_type">Type:</label>
               
            <h3 style=" color: #d8dfe2;">  <?php echo $data['request_type'];?></h3> 
                </div>

            
                
                     <div class="form-group">
                <label style=" color: #d8dfe2" for="request_status">Status</label>
                <select  class="form-control" name="request_status" value="<?php echo $data['request_status']; ?>" >
                    <option value="Open" >Open</option>
                    <option value="Accepted" >Accepted</option>
                    <option value="Dismissed" >Dismissed</option>

                    </select><br >
                </div>


                    

                    <div class="form-group">
               <input type= "hidden" name= "request_id" class="btn btn-info btn-md" value= "<?php echo $data['request_id']?>" />
               <button  type= "submit" id="submit" class="btn btn-info btn-md" >Save Changes</button >
               </div>

       
              <span id="message"></span>
              <script src="ajax.js"  type="text/javascript"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script> 
          
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