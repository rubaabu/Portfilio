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
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ban user</title>

    <?php include 'src/inc/lib.inc.php'; ?>
  
  <link href="src/inc/userland.css" rel="stylesheet">

</head>
<body>

<?php include 'src/inc/navbartop.php'; ?>

<div class="container mt-3">
  <div class="container text-white w-50 bg-info rounded" style="height: 450px;">
    <div class="h3 text-white text-center my-2 "> Ban a user</div>

    

<form method="post" action="../sys/actionFiles/banUserAction.php">
	
	<div class ="form-group">
     <select class="form-control" name="name">
	<?php
           $sql = "SELECT * FROM user ";

            $setup->connect();

        	$result = mysqli_query($setup->conn,$sql);

        	$setup->disconnect();

            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                		
                <option value="<?php echo $row['user_id'];?>"><?php echo $row['user_nickname'];?> </option>
                		
<?php 
} 	
}
?>

     </select>
    </div>
	<div class="form-group">
     <input class="form-control" type="date" name="date" value="">
    </div>

    
                    <div class="form-group text-center mt-3">
						<button class ="btn btn-dark" type ="submit" name="submit">Ban user</button>
					</div>
					</div>
					</div>
  </form>

<?php include 'src/inc/footer.php'; ?>
</body>
</html>