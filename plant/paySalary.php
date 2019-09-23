<!DOCTYPE html>
<html lang="en">
<head>
    


<body>
    
<h3> pay salary </h3>
<label>To:</label>
<form action="action/paysalary.php" method="post">
<select name="fullname">
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

<label>Amount:</label>
<input type="text" name="amount" placeholder="€"/><br >
<label>Date:</label>
<input type="date" name="date" /><br >
<button type ="submit" name="pay" class='btn btn-dark'>pay</button>
</form>
</body>
</html>