<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
   <?php require 'header.php'; ?>
    <title>Send Request</title>
<style>.body{
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
<a href="managerpage.php"><button type='button' class='btn btn-info'>back</button></a>

<div id="ru">
      
        <div class="container">
       
            <div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">
                        <form id="ru-form" class="form" action="action/sendRequest.php" method="post">
                            <h3 style=" color: #d8dfe2" class="text-center ">Send request</h3>
                            <div class="form-group">
                                <label for="type" style=" color: #71adb5">Type</label><br>
                               
                                <select class="form-control" name="type" >
                                    <option  value="sale">Sale</option>
                                    <option  value="pay">pay</option>
                                    <option  value="buy">buy</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="message" style=" color: #71adb5">Message:</label><br>
                                <input type="text" name="message"  class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="status" style=" color: #71adb5">Status</label>
                                    <select name="status" class="form-control" >
                                    <option value="Open">Open</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Dismissed">Dismissed</option>
                                    </select><br >
                                
                                <input type="submit" name="apply" class="btn btn-info btn-md" value="Send">
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require 'footer.php'; ?>

</body>
</html>