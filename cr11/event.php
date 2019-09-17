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
	<title>Event</title>
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
<h1>Events</h1>

<hr />
<h2>Things to do</h2>

<?php
           $sql = "SELECT * FROM things_to_do ";
           // $result = $conn->query($sql);
           $result = mysqli_query($conn,$sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                	<div class="container">



<h3><?php echo $row['things_name'] . "<br>"; ?></h3>

<span>Type:</span> <?php echo $row['things_Type']. "<br>"; ?>

<span>short description:</span> <?php echo $row['short_description']. "<br>"; ?>

<?php echo'<a href="' . $row['web_address'].'" target="_blank">' ; ?><p>WEB ADDRESS</p></a>

<span>Location:</span> <?php echo $row['things_location'] ."<br><br>"; ?>
 <div class="btn-group">
  <?php if(isset($_SESSION["admin"])){ echo "
      <a href='th_update.php?id=" .$row['things_id']."'><button type='button' class='btn btn-dark'>Edit</button></a>
      <a href='th_delete.php?id=" .$row['things_id']."'><button type='button' class='btn btn-dark'>Delete</button></a>";}?>
  <hr />
  <br>
      </div>   
      <hr />                  
</div>
<?php 
}
}
?>
<?php if(isset($_SESSION["admin"])){ ?>
   <fieldset >
   <legend>Add Things to do</legend>

   <form  action="actions/a_th_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
        <tr>
               <th>Name</th >
               <td><input class="form-control" type="text" name="things_name"  placeholder="things_name" /></td >
           </tr>
           <tr>
               <th>Location</th >
               <td><input class="form-control" type="text" name="things_location"  placeholder="things_location" /></td >
           </tr>     
           <tr>
               <th>Type </th>
               <td><input class="form-control" type="text" name="things_type" placeholder="things_type" /></td>
           </tr>
           <tr>
               <th>short description</th>
               <td><input class="form-control" type="text"  name="short_description" placeholder ="short_description" /></td>
           </tr>
           <tr>
               <th>Web address </th>
               <td><input class="form-control" type="text" name="web_address" placeholder="web_address" /></td>
           </tr>
           
           

           <tr>
               <td><button type ="submit">Insert Things to do</button></td>
               
           </tr >
       </table>
   </form>

</fieldset >


   <?php } ?>
            <hr />
            <br>      
          <h2>Concerts</h2>     
           <?php 
$sql1 = "SELECT * FROM concerts";
           // $result = $conn->query($sql);
           $result1 = mysqli_query($conn,$sql1);

            if(!empty($result1) && $result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) { ?>

                  <div class="container">

<!-- Displaying Data Read From Database -->

 <h3><?php echo $row1['concert_name'] . "<br>"; ?></h3>

<span>Date:</span> <?php echo $row1['eventdate']. "<br>"; ?>
<span>Time:</span> <?php echo $row1['eventtime']. "<br>"; ?>
<span>Location:</span> <?php echo $row1['concert_location'] ."<br>"; ?>
<?php echo'<a href="' . $row['web_address'].'" target="_blank">' ; ?><p>WEB ADDRESS</p></a>
<span>Price:</span> <?php echo $row1['price']. "<br>"; ?>
<?php if(isset($_SESSION["admin"])){ echo "
 <a href='con_update.php?id=" .$row1['concert_id']."'><button type='button'class='btn btn-dark'>Edit</button></a>
      <a href='con_delete.php?id=" .$row1['concert_id']."'><button type='button'class='btn btn-dark'>Delete</button></a>" ;} ?>
        <hr />
  <br>                   
</div>
<?php 
}
}
?>
<?php if(isset($_SESSION["admin"])){ ?>
   <fieldset >
   <legend>Add Concert</legend>

   <form  action="actions/a_con_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
        <tr>
               <th>Name</th >
               <td><input class="form-control" type="text" name="concert_name"  placeholder="concert_name" /></td >
           </tr>
           <tr>
               <th>Location</th >
               <td><input class="form-control" type="text" name="concert_location"  placeholder="concert_location" /></td >
           </tr>     
           <tr>
               <th>Event date </th>
               <td><input class="form-control" type="text" name="eventdate" placeholder="eventdate" /></td>
           </tr>
           <tr>
               <th>Event time</th>
               <td><input class="form-control" type="text"  name="eventtime" placeholder ="eventtime" /></td>
           </tr>
           <tr>
               <th>Web address </th>
               <td><input class="form-control" type="text" name="web_address" placeholder="web_address" /></td>
           </tr>
           <tr>
               <th>Price</th>
               <td><input class="form-control" type="text" name="price" placeholder="price" /></td>
           </tr>
           

           <tr>
               <td><button type ="submit">Insert Concert</button></td>
               
           </tr >
       </table>
   </form>

</fieldset >
   <?php } ?>
<?php 
   $result->free();
   $result1->free();
 ?>
            










</div>
</body>
</html>
