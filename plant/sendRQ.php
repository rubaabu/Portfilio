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
                        <form class="form" id="myForm" action="action/sendRequest.php" method="post">
                            <h3 style=" color: #d8dfe2" class="text-center ">Send request</h3>
                            <div class="form-group">
                                <label for="type" style=" color: #71adb5">Type</label><br>
                               
                                <select class="form-control" name="type" >
                                    <option  selected="selected">Choose type</option>
                                    <option  value="sale">Sale</option>
                                    <option  value="pay">pay</option>
                                    <option  value="buy">buy</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <p  style=" color: #71adb5">Message:</p><br>
                                <input type="text" id="message" name="message"  class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="status" style=" color: #71adb5">Status</label>
                                    <select name="status" class="form-control" >
                                    <option  selected="selected">Choose Status</option>
                                    <option value="Open">Open</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Dismissed">Dismissed</option>
                                    </select><br >
                                
                        
                             <button class="btn btn-info" id="submit" type="submit">send</button>

                                
                            </div>

                            
                        </form>
                        <span id="message"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require 'footer.php'; ?>

    <script>
        $("#submit").click( function() { // when submit button is clicked
        $.post( $( "#myForm").attr("action"), // fetch the URL from myForm
                $("#myForm :input").serializeArray(), // serialize the data from the input fields, creating an array of objects (name and value pairs)
                function(info){ $("#message" ).html(info); // append the response to element with id of message
        });
        clearInput(); // Call the customized clearInput()
        });

        $("#myForm" ).submit( function() {
        return  false;        // do not redirect after submit is clicked
        });

        function clearInput() { // clear all input fields from #myForm
            $ ("#myForm :input").each( function() {
                    $(this).val('');
            });
        }
  </script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script> 
</body>
</html>