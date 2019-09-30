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
        header('Location: engpage.php');
    $var = $_SESSION['eng'];

   } else if (isset($_SESSION['acc'])){
    header('Location: accPage.php');
$var = $_SESSION['acc'];

}else if (isset($_SESSION['dealer'])){
    header('Location: dealerpage.php');
    $var = $_SESSION['dealer'];

}
   else {
 

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

<?php require '../header.php'; ?>
<style>
   .body{
       background-color: #d0ecf0
   }
 #ru .container #ru-row #ru-column #ru-box {
    
  margin-top: 50px;
  max-width: 600px;
  height: 300px;
  border: 1px solid #9C9C9C;
  background-color: #176d81;
  margin-bottom: 400px;
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

<a href="../applyJob.php"><button type='button' class='btn btn-info'>back</button></a>



 <div id="ru">
      
      <div class="container">
     
          <div id="ru-row" class="row justify-content-center align-items-center">
              <div id="ru-column" class="col-md-6">
                 <div id="ru-box" class="col-md-12"> <br>
<h2 style="color: #0d3446" >Please upload</h2><br>


<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

//Setting errors array
$errors = array();


//Get info from the form
$file_name = $_FILES['my_file']['name'];
$file_type = $_FILES['my_file']['type'];
$file_temp = $_FILES['my_file']['tmp_name'];
$file_size = $_FILES['my_file']['size'];
$file_error = $_FILES['my_file']['error'];




//set Allowed files extensions
$allowed_extensions = array('pdf','gif','jpeg','png','jpg');

//get file extension
$tmp =explode('.', $file_name);
$file_extension = end($tmp);

//check if file uploaded
if($file_error == 4){

    $errors[] = '<div> No file uploaded</div>';

}


else {
    // check file size
     if($file_size > 1500000){
    $errors[] = '<div> File cant be more than x</div>';
}

//check if the file valid
if(! in_array($file_extension, $allowed_extensions)){

    $errors[] = '<div> File not valid</div>';

}
}
// check if has no errors
if(empty($errors)){

    move_uploaded_file($file_temp, $_SERVER['DOCUMENT_ROOT'] . '\plant\uploads\\' .$file_name );
//success message
    echo'file uploaded';

} else {

//loop throw errors
    foreach($errors as $error){
        echo $error;
    }
}

}

?>
                <form id="ru-form" class="form" action="" method="post" enctype="multipart/form-data">
                
                
                    <input type="file" name="my_file" style="color:#d0ecf0" id=""><br><br>
                    <input  class="btn btn-info btn-md" type="submit" value="upload">
                   

                </form>

</div>
                </div>
            </div>
        </div>
    </div>
<?php require '../footer.php'; ?>    
</body>
</html>
