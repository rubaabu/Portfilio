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
   <title >Delete</title>
</head>
<body>

<h3>Do you really want to delete this Q?</h3>
<form action ="delete_QM.php" method="post">

   <input type="hidden" name="id" value="<?php echo $data['q_message'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="../dealerpage.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>