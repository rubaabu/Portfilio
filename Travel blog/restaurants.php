<?php
ob_start();
session_start();
require_once 'actions/db.php';


if( !isset($_SESSION['user' ]) && !isset($_SESSION['admin']) ) {
 header("Location: index.php");
 exit;
}

if(isset($_SESSION['admin'])){
  $var = $_SESSION['admin'];
}else {
  $var = $_SESSION['user'];
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$var);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurants</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



  
	<style >
		.form {
				width:400px;
				float:left;
				background-color:#fff;
				font-family:'Droid Serif',serif;
				padding-left:30px
}
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}


	</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <a  href="logout.php?logout" style="text-align: center; color: #483D8B;">Sign Out</a>
  <h2 style="text-align: center; font-size: 40px; font-weight: 900; font-family: sans-serif; ">Travel blog</h2>
<p style="text-align: center; font-size: 30px;font-weight: 700; font-family: sans-serif; ">Welcome to our blog. Enjoy it!</p>

<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="restaurants.php  ?>">Restaurants</a></li>
  <li><a href="event.php">Event</a></li>
  
</ul>
<h2>The best restaurants in Vienna</h2>

<hr />
<h2 style="color: #483D8B;">Restaurants</h2>

<?php
           $sql = "SELECT * FROM restaurants ";
           // $result = $conn->query($sql);
           $result = mysqli_query($conn,$sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                	<div class="container">



<h3><?php echo $row['restaurant_name'] . "<br>"; ?></h3>
<span>Type:</span> <?php echo $row['restaurant_type']. "<br>"; ?>
<span>tel:</span> <?php echo $row['restaurant_tel']. "<br>"; ?>
<span type="text">Description:</span> <?php echo $row['short_description']. "<br>"; ?>
<?php echo'<a href="' . $row['web_address'].'" target="_blank">' ; ?><p>WEB ADDRESS</p></a>

<?php if(isset($_SESSION["admin"])){ echo "
 <a href='update.php?id=" .$row['restaurant_id']."'><button type='button' class='btn btn-dark'>Edit</button></a>
      <a href='delete.php?id=" .$row['restaurant_id']."'><button type='button' class='btn btn-dark'>Delete</button></a>"
  ; } ?>

    <hr />
    <br>  
                         
</div>
<?php 
}
}

?>
                  
               
           <?php 
           $result->free();
           ?>
            


<?php if(isset($_SESSION["admin"])){ ?>
   <fieldset >
   <legend>Add Restaurant</legend>

   <form  action="actions/a_create.php" method= "post" >
       <table cellspacing= "0" cellpadding="0">
        <tr>
               <th>Name</th >
               <td><input class="form-control" type="text" name="restaurant_name"  placeholder="restaurant_name" /></td >
           </tr>
           <tr>
               <th>Location</th >
               <td><input class="form-control" type="text" name="restaurant_location"  placeholder="restaurant_location" /></td >
           </tr>     
           <tr>
               <th>Type </th>
               <td><input class="form-control" type="text" name="restaurant_type" placeholder="restaurant_type" /></td>
           </tr>
           <tr>
               <th>short description</th>
               <td><input class="form-control" type="text"  name="short_description" placeholder ="short_description" /></td>
           </tr>
           <tr>
               <th>TEL </th>
               <td><input class="form-control" type="text" name="restaurant_tel" placeholder="restaurant_tel" /></td>
           </tr>
           <tr>
               <th>web address </th>
               <td><input class="form-control" type="text" name="web_address" placeholder="web_address" /></td>
           </tr>
           

           <tr>
               <td><button type ="submit">Insert Restaurant</button></td>
               <td ><a href= "home.php"><button  type="button">Back</ button></a></td>
           </tr >
       </table>
   </form>

</fieldset >
   <?php } ?>
<input type="file" name="">




</body>
</html>
