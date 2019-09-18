<?php 
require 'DBsetup.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
		
		$sql = "SELECT * FROM support_message";

		   	$this->connect();

        $result = mysqli_query($this->conn,$sql);

        	$this->disconnect();

            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
 		<div>
 			<h3><?php echo $row['support_message_from'] . "<br>"; ?></h3>
 			<span>Type:</span> <?php echo $row['support_message_type']. "<br>"; ?>
 			<span>The message:</span> <?php echo $row['support_message_message']. "<br>"; ?>
 			<span>Date:</span> <?php echo $row['support_message_date']. "<br>"; ?>
 			<div>
 			
 			<a href='?id=" .$row['support_message_id']."'><button type='button'>Delete</button></a> 
<br>
      </div>
  </div>
<?php 
}
}
?>
</body>
</html>