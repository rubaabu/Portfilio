<?php
ob_start();
session_start();
require 'db.php';

if( !isset($_SESSION['user' ]) && !isset($_SESSION['director'])  && !isset($_SESSION['eng']) && !isset($_SESSION['dealer'])) {
    header("Location: login.php");
    exit;
   }
  
   if(isset($_SESSION['director'])){
      header('Location: directorpage.php');
      $var = $_SESSION['director'];

  } else if (isset($_SESSION['eng'])){
       header('Location: engpage.php');
       $var = $_SESSION['eng'];

  }else if (isset($_SESSION['dealer'])){
        header('Location: dealerpage.php');
        $var = $_SESSION['dealer'];

} else {
   
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
   <a  href="logout.php?logout" style=" color: #483D8B;">Sign Out</a><hr>
   <a class='btn btn-dark' href="userprofile.php?userid">my profile</a>

   <h2>Products</h2>
   <hr >

    <?php 
        $sql ="SELECT * FROM products";

        $result=mysqli_query($conn,$sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){ ?>

<div>
                <h4><?php echo $row['product_name'];?></h4>
                <span>Quantity</span> <?php echo $row['product_quantity']; ?><br>
                <span>date</span><?php echo  $row['product_date']; ?><br>
                <span type="text">description</span><?php echo $row['product_description']; ?><br>
                <hr>
</div>

 <?php
 }
}
    ?>
    <?php 
           $result->free();
           ?>




<fieldset>
    <legend>Order your product</legend>
    <hr>
    <form  action="action/userbuy.php" method= "post" >
    <input type="text" name="message" placeholder="enter the message" /><br >
    <input type="date" name="date" /><br >

    <button class='btn btn-dark' type ="submit" name="send">send</button>
    <a href= "landingpage.php"><button class='btn btn-dark' type="button">Back</ button></a>
    </form>
</fieldset>







<fieldset>
    <legend>apply for a jop</legend>
    <hr>
    <form  action="action/employmentApp.php" method= "post" >

    <select name="type">
    <option selected="selected">Choose type</option>
    <?php 
        $sql = "SELECT * FROM employment_type";
        $result = mysqli_query($conn,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $item){
            ?>
            <option value="<?php echo $item['type_id'];?>"><?php echo $item['type_name']; ?> </option>
            <?php 
        }
    
    ?>
   
    </select><br>
    <input type="text" name="message" placeholder="enter the message" /><br >

    <input type="file" name="file" /><br >

    <button class='btn btn-dark'type ="submit" name="apply">send</button>
    <a href= "landingpage.php"><button class='btn btn-dark' type="button">Back</ button></a>
    </form>
</fieldset>






</body>
   </html>
   
