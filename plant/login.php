<?php 
ob_start();
session_start();
require 'db.php';


$email ="";
$emailError="";
$passwordError="";
$password ="";
$error = false;


if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);


    if(empty($email)){
        $error = true;
        $emailError = "please enter your email address";
    } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = true;
        $emailError= "please enter a valid email address";
    }

    if(empty($password)){
        $error = true;
        $passwordError ="please enter your password";
    } 


    if (!$error) {
  
        $pass = hash( 'sha256', $password); // password hashing
      
        $res=mysqli_query($conn, "SELECT user_id, fullname, password, role FROM users WHERE email='$email'" );
        $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row 
        
        if( $count == 1 ) {
          if($row["role"] == "director"){

            $_SESSION['director'] = $row['user_id'];
         header( "Location: directorpage.php");

          } else if($row["role"] == "eng"){

            $_SESSION['eng'] = $row['user_id'];
         header( "Location: engpage.php");

          } else if($row["role"] == "dealer"){

            $_SESSION['dealer'] = $row['user_id'];
         header( "Location: dealerpage.php");

          } else {
              
            $_SESSION['user'] = $row['user_id'];
         header( "Location: landingpage.php");
          
          }
         
        } else {
         $errMSG = "Incorrect Credentials, Try again..." ;
        }
    }
       
}
?>

<html>
<head>
<title>login</title>
<?php require 'header.php'; ?>
</head>
<body>
<a class='btn btn-dark'href="register.php">register</a>
<h2>Login</h2>

    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">

        <input type="email" name="email" placeholder="please enter your email" />
        <label value="<?php echo $emailError; ?>"></label>

        <input type="password" name="password" placeholder="please enter your password" />
        <label value="<?php echo $emailError; ?>"></label>

        <button type="submit" name="login">login</button>

    </form>



</body>
</html>
<?php ob_end_flush(); ?>