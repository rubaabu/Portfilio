<?php
$servername = "173.212.235.205";
// 173.212.235.205
$username = "rubacode_plant"; 
// rubacode_plant
$password = "Xer{QLc2!2LT";
//  Xer{QLc2!2LT
$dbname = "rubacode_plant";
// rubacode_plant

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: "  . mysqli_connect_error());

} 

?>