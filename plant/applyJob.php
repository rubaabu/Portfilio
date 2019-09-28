<?php 
require 'db.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'header.php'; ?>
<style>.body{
        background-color: #d8dfe2
    }
 #login .container #login-row #login-column #login-box {
    
  margin-top: 50px;
  max-width: 600px;
  height: 500px;
  border: 1px solid #9C9C9C;
  background-color: #176d81;
  margin-bottom: 50px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
   
</head>
<body class="body">
<?php require 'nav.php'; ?><br>
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>
<div id="login">
 <div class="container">
  
    
    <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="action/employmentApp.php" method= "post" enctype="multipart/form-data">

                    <h3 style=" color: #d8dfe2" class="text-center ">Apply for a job</h3>

                        <div class="form-group">
                        <label for="status" style=" color: #71adb5">Type</label>
                        <select name="type" class="form-control">
                            <option selected="selected">Choose type</option>
                            <?php 
                                $sql = "SELECT * FROM employment_type";
                                $result = mysqli_query($conn,$sql);
                                if (!$result) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                }
                                $rows = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($rows as $item){
                                    ?>
                                    <option value="<?php echo $item['type_id'];?>"><?php echo $item['type_name']; ?> </option>
                                    <?php 
                                }
                            
                            ?>
                        
                            </select><br>
                        </div>

                        <div class="form-group">
                                    <label for="message" style=" color: #71adb5">Message:</label><br>
                                    <input type="text" name="message"  class="form-control">
                        </div>

                       
                                <input type="submit" name="apply" class="btn btn-info btn-md" value="upload">
                    </form>
                    </div>            
                </div>            
             </div>            
        </div>            
    </div>            
    
    <?php require 'footer.php'; ?>
</body>
</html>