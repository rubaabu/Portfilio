<?php 
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
  <title>Welcome <?php echo $_SESSION['user_nickname'] ?> </title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->
  <link href="src/inc/userland.css" rel="stylesheet">

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>

<div class="container mt-3">
  <div class="container text-white w-50 bg-info rounded" style="height: 450px;">
    <div class="h3 text-white text-center my-2 "> create a game</div>


   
   <div class="container text-white">
   <form  method= "post" action="../sys/actionFiles/creategameAction.php" enctype="multipart/form-data">

       
           <div class="form-group">
               <label>Name</label>
               <input class="form-control" type="text" name="name"  placeholder="name" value="" />
           </div> 

<div class ="form-group">
<select name="tag" class="form-control">
        <option selected="selected">Choose tag</option>
        <?php
        require '../sys/DBsetup.php';
          $setup = new DBsetup;
       
        $sql = "SELECT * from game_tag";
        $setup->connect();
        $result = mysqli_query($setup->conn,$sql);
        $setup->disconnect();
        $rows= $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $item){
        ?>
        <option value="<?php echo $item['game_tag_id']; ?>"><?php echo $item['game_tag_name']; ?></option>
        <?php
        }
        
        ?>
    </select>
</div>
           <div class="form-group">
               <label>Image </label>
               <input  type="file" name="pic" placeholder="pic" value="" />
           </div>
           <div class="form-group text-center mt-3"> 
               <button class ="btn btn-dark"type ="submit" name="post">create game</button>
               
           </div >
       
   </form>
</div>
</div>
</div>

<?php include 'src/inc/footer.php'; ?>
</body>
</html>

