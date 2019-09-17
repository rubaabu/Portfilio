<?php 

session_start();
require 'db.php';



if( !isset($_SESSION['user' ]) && !isset($_SESSION['director']) && !isset($_SESSION['eng']) ) {
    header("Location: login.php");
    exit;
    }

   
   
   if(isset($_SESSION['director'])){
      
     $var = $_SESSION['director'];

   } else if (isset($_SESSION['eng'])){
        header('Location: engpage.php');
    $var = $_SESSION['eng'];

   }else if (isset($_SESSION['dealer'])){
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



<html>
<head>
<?php require 'header.php'; ?>
</head>
<body>

<a class='btn btn-blue'href ="logout.php?logout">Sign out</a><br><br>

<a class='btn btn-dark'href="users.php">Users</a>
<a class='btn btn-dark' href="employees.php">Employees</a>
<a class='btn btn-dark'href="repository.php">Repositories</a>
<a class='btn btn-dark'href="section.php">Sections</a>
<a class='btn btn-dark'href="qmessage.php">Q messages</a>
<a class='btn btn-dark'href="userprofile.php">My profile</a>

<hr >



<div class="container">
<h3>the Requests</h3>

<?php 
$sql = "SELECT * FROM requests
        JOIN users ON fk_user_from=user_id
        ";
        $result =mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        if($result->num_rows> 0) {
            while($row = $result->fetch_assoc()) {?>

                <span>From:</span><?php echo $row['fullname'];?><br>
                <span>Type:</span><?php echo $row['request_type'];?><br>
                <span>message:</span><?php echo $row['request_message'];?><br>
                <span>Date:</span><?php echo $row['request_date'];?><br>
               
            

<hr>


<?php
}
}
?>

<hr>
<h3>The employment requests</h3>
<?php 
$sql = "SELECT * FROM employment_app
        JOIN users ON fk_user_from=user_id
        JOIN employment_type ON fk_type_id=type_id";
       
        $result =mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        if($result->num_rows> 0) {
            while($row = $result->fetch_assoc()) {?>

                <span>From:</span><?php echo $row['fullname'];?><br>
                <span>Type:</span><?php echo $row['type_name'];?><br>
                <span>message:</span><?php echo $row['employment_message'];?><br>
                <span>file:</span><?php echo $row['employment_file'];?><br>
                <span>Date:</span><?php echo $row['employment_date'];?><br>
                <hr>
                





<?php
}
}
?>

<fieldset>
    <legend>Hiring new emploeers</legend>
    <hr>
    <form  action="action/hiring.php" method= "post" >

    <select name="user">
    <option selected="selected">Choose user</option>
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
    <label>Status:</label><br> 
    <label for="status">Worker</label>
    <input type="radio" name="status" value="worker" /><br >
   
 <label for="status">manager</label>
    <input type="radio" name="status" value="manager" /><br >
   
 <label for="status">engineer</label>
    <input type="radio" name="status" value="engineer" /><br >
   
    <label for="status">accountant</label>
    <input type="radio" name="status" value="accountant" /><br >

    <label for="status">dealer</label>
    <input type="radio" name="status" value="dealer" /><br >

    <label for="status">technicien</label>
    <input type="radio" name="status" value="technicien" /><br >


    

    <button type ="submit" class='btn btn-dark'name="apply">hire</button>
    
</fieldset>


<h3> pay salary </h3>
<label>To:</label>

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
<button type ="submit" name="apply"class='btn btn-dark'>pay</button>

</div>

<hr >
</body>


</html>