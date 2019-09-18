<?php 
require '../sys/DBsetup.php';
$setup = new DBsetup;

session_start();
if (!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
} else if ($_SESSION['user_roll'] == 'user') {
  header('Location: userlanding.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ADM Support Messages</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>

      <div class="container mt-2">
            <div class="row">
              <div class="col-md-12">
                    <div class="w-100">
                        <div id="supportmessages" class="container bg-info">
                            <div class="h2 text-center">Support Messages</div>
                            <div class="list-group list-group-flush">   
                            <?php 
		
    $sql = "SELECT * FROM support_message
            JOIN user ON support_message_from = user_id";

		   	$setup->connect();

        $result = mysqli_query($setup->conn,$sql);

        	$setup->disconnect();

            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
            <div class="list-group-item bg-dark text-white mb-2 rounded">
                <div><p>User Name <?php echo $row['user_nickname'];?> - Type: <?php echo $row['support_message_type']. "<br>"; ?></p></div>
                <div>Message: <?php echo $row['support_message_message']. "<br>"; ?></div>
                <div>Date: <?php echo $row['support_message_date']; ?> 
                <a href='?id=<?php echo $row["support_message_id"]; ?>'><button class="btn btn-info submit" type='button' value="<?php echo $row["support_message_id"]; ?>">Delete</button></a> 
                </div>			   
                </div>
<?php 
}
}
?>
                                               
                            </div>
                        </div>
                  </div>
              </div>  <!--end col -->             
            </div><!--end row-->
        </div><!--end content fluid-->
  

    



<?php include 'src/inc/footer.php'; ?>

  
<script>
  $('.submit').click(function() {
    
    $.ajax({
      method: 'POST',
      url: '../sys/actionFiles/admsupportAction.php',
      data: { submit: this.value }
    }).done(function(res) {
      //console.log(res);
      
      location.reload();
    });
  });
</script>
  


</body>

</html>
