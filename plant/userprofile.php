<?php 
ob_start();
session_start();

require 'function.php';

$user = new DBuser; 
$user_data;
if(isset($_GET['userid'])) {

  $user_data = $user->getUserData($_GET['userid']);

}
?>
<html>
<head></head>
<body>
<a href="logout.php?logout">logout</a>
<hr>
<h3><?php echo $user_data['fullname'];?></h3>
<h4><?php echo $user_data['date_of_birth'];?></h4>
<h4><?php echo $user_data['email'];?></h4>
<h4><?php echo $user_data['password'];?></h4>
<h4><?php echo $user_data['telefon'];?></h4>
<h4><?php echo $user_data['address'];?></h4>
<h4><?php echo $user_data['gender'];?></h4>
<h4><?php echo $user_data['status'];?></h4>
<h4><?php echo $user_data['children'];?></h4>
<h4><?php echo $user_data['nationality'];?></h4>
<h4><?php echo $user_data['education'];?></h4>
<h4><?php echo $user_data['date_of_start'];?></h4>
<h4><?php echo $user_data['role'];?></h4>

<a href="landingpage.php">back</a>



</body>
</html>
