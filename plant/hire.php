<?php
require 'db.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'header.php'; ?>
<style>
.body{
        background-color: #d0ecf0
    }
 #ru .container #ru-row #ru-column #ru-box {
    
  margin-top: 50px;
  max-width: 600px;
  height: 500px;
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

<?php require 'nav.php'; ?>
<a href="jobRq.php"><button type='button' class='btn btn-info'>back</button></a>

    
<div id="ru">
 <div class="container">
  
     
            <div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">
                         <form id="myForm" class="form" action="action/hiring.php" method= "post" >
                         <h3 style=" color: #d8dfe2" class="text-center ">Hire more people</h3>

                         <div class="form-group">
                         <label for="user" style=" color: #d8dfe2">Name</label>
                            <select name="user" class="form-control">
                            <option selected="selected">Choose user</option>
                            <?php 
                                $sql = "SELECT * FROM users";   
                                $result = mysqli_query($conn,$sql);
                                if (!$result) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                }
                                $rows = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($rows as $item){
                                    ?>
                                    <option value="<?php echo $item['user_id'];?>"><?php echo $item['fullname']; ?> </option>
                                    <?php 
                                }
                            
                            ?>
                        
                            </select><br>
                            </div>
                            <div class="form-group">
                                <label style=" color: #d8dfe2">Position:</label><br> 
                                <label style=" color: #71adb5"for="status">Worker</label>
                                <input type="radio" name="status" value="worker" /><br >
                            
                                <label  style=" color: #71adb5" for="status">manager</label>
                                <input type="radio" name="status" value="manager" /><br >
                            
                                <label style=" color: #71adb5" for="status">engineer</label>
                                <input type="radio" name="status" value="engineer" /><br >
                            
                                <label style=" color: #71adb5" for="status">accountant</label>
                                <input type="radio" name="status" value="accountant" /><br >

                                <label style=" color: #71adb5" for="status">dealer</label>
                                <input type="radio" name="status" value="dealer" /><br >

                                <label style=" color: #71adb5" for="status">technicien</label>
                                <input type="radio" name="status" value="technicien" /><br >

                            </div> <button type ="submit" id="submit" class='btn btn-info'name="apply">Hire</button>
                            
 <span id="message"></span>
<script src="action/ajax.js"  type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script> 

                             </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
    

   
   

    <?php require 'footer.php'; ?>

</body>
</html>
