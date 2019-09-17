<?php 

require_once '../db.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM employees WHERE employee_id = {$id}" ;
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

<h3>Do you really want to delete this book?</h3>
<form action ="delete_Emp.php" method="post">

   <input type="hidden" name="id" value="<?php echo $data['employee_id'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="employees.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>