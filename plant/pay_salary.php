<?php 
require 'db.php';
ob_start();
session_start();
if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) && !isset($_SESSION['dealer']) && !isset($_SESSION['acc']) ) {
    header("Location: login.php");
    exit;
    }


   if(isset($_SESSION['acc'])){
      
     $var = $_SESSION['acc'];

   } else if (isset($_SESSION['director'])){
        header('Location: directorpage.php');
    $var = $_SESSION['director'];

   }else if (isset($_SESSION['eng'])){
    header('Location: engpage.php');
    $var = $_SESSION['eng'];

    } else if (isset($_SESSION['dealer'])){
    header('Location: dealerpage.php');
    $var = $_SESSION['dealer'];

}
   else {
    header('Location: landingpage.php');

    $var = $_SESSION['user'];

   }

   //select the user that he is logged in
   $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$var);

   //to know what is the proplem if there are one
   if (!$result) { 
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
   $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);
  
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
<a href="accPage.php"><button type='button' class='btn btn-info'>back</button></a>

    
<div id="ru">
 <div class="container">
  

            <div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">

    <form id="myForm" class="form" action="action/paysalary.php" method="post">
    <h3 style=" color: #d8dfe2" class="text-center ">Pay salary</h3>

    <div class="form-group">
        <label for="user" style=" color: #d8dfe2">Name</label>
        <select class="form-control" name="fullname">
            <option selected="selected">Choose name</option>
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
            <label>Amount:</label>
            <input class="form-control" type="text" name="amount" placeholder="€"/><br >
    </div>         
    <div> <button type="submit" id="submit"  class='btn btn-info'>pay</button></div>

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