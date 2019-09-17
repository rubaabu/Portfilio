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
<style>
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
</head>
<body>

<h2 style="text-align: center; font-size: 40px; font-weight: 900; font-family: sans-serif; ">Travel blog</h2>
<p style="text-align: center; font-size: 30px;font-weight: 700; font-family: sans-serif; ">Welcome to our blog. Enjoy it!</p>

<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="restaurants.php  ?>">Restaurants</a></li>
  <li><a href="event.php">Event</a></li>
  
</ul>




<a  href="logout.php?logout" style=" color: #483D8B;">Sign Out</a>
</body>
</html>