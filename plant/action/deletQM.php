<?php 

require_once '../db.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM q_message WHERE q_message = {$id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<?php require '../header.php'; ?>

<style>
.body{
 background-color: #d0ecf0
}
#ru .container #ru-row #ru-column #ru-box {

margin-top: 100px;
max-width: 600px;
height: 300px;
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
<a href="../qmessage.php"><button type='button' class='btn btn-info'>back</button></a>

<div id="ru">
 <div class="container">

         
            <div id="ru-row" class="row justify-content-center align-items-center">
                <div id="ru-column" class="col-md-6">
                    <div id="ru-box" class="col-md-12">

               <form id="myForm" action ="delete_QM.php" method="post">
               <h3 style=" color: #d8dfe2" class="text-center ">Delete ?</h3>


                  <input type="hidden" name="id" value="<?php echo $data['q_message'] ?>" />
                  <button id="submit" type="submit">Yes, delete it!</button >



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