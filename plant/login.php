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
        
        if( $count == 1 && $row['password' ]==$pass) {
          if($row["role"] == "director"){

            $_SESSION['director'] = $row['user_id'];
         header( "Location: directorpage.php");

          } else if($row["role"] == "eng"){

            $_SESSION['eng'] = $row['user_id'];
         header( "Location: engpage.php");

          }else if($row["role"] == "manager"){

            $_SESSION['manager'] = $row['user_id'];
         header( "Location: managerpage.php");

          } else if($row["role"] == "dealer"){

            $_SESSION['dealer'] = $row['user_id'];
         header( "Location: dealerpage.php");

          }  else if($row["role"] == "acc"){

            $_SESSION['acc'] = $row['user_id'];
         header( "Location: accPage.php");

          } else {
              
            $_SESSION['user'] = $row['user_id'];
         header( "Location: landingpage.php");
          
          }
         
        } else {
         $errMSG = "Incorrect email or password, Try again..." ;
        }
    }
       
}
?>

<html>
<head>
<title>login</title>
<?php require 'header.php'; ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>


/* BASIC */

html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
  background-color: #d0ecf0;
  
}

a {
  color: #17A2B8;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #17A2B8;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #17A2B8;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #17A2B8;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #17A2B8;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #17A2B8;
}

input[type=text]:placeholder {
  color: #cccccc;
}

input[type=password] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=password]:focus {
  background-color: #fff;
  border-bottom: 2px solid #17A2B8;
}

input[type=password]:placeholder {
  color: #cccccc;
}

/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #17A2B8;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #17A2B8;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}


</style>



</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
<br>
   <h4 style="color: #17A2B8;" >Log In!</h4>

    <!-- Login Form -->
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >

    <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
           
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="login"><br>
      <span style="color: red"><?php echo $emailError; ?></span><br>

      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"><br>
      <span style="color: red" ><?php echo $passwordError; ?></span><br>

      <input type="submit" name="login" class="fadeIn fourth btn btn-info" value="Log In">
       <div>
    
      <strong style=" color: #71adb5; font-size: 10px">as user + manager</strong><br>
      <strong  style ="color: #71adb5; font-size: 10px" >email: user@gmail.com + manager@gmail.com <br> password: 123123</strong><hr >
      <strong style=" color: #71adb5; font-size: 10px" >as director + dealer:</strong><br>
      <strong  style ="color: #71adb5; font-size: 10px" >email: director@gmail.com + dealer@gmail.com<br> password: 123123</strong><hr >
      <strong style=" color: #71adb5; font-size: 10px" >as engineer + accountant + accountant:</strong><br>
      <strong  style ="color: #71adb5; font-size: 10px" >email: eng@gmail.com + acc@gmail.com + acc@gmail.com<br> password: 123123</strong>

    
    </div>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="register.php">register?</a>
    </div>
   
  </div>
</div>










<?php require 'footer.php'; ?>


</body>
</html>
<?php ob_end_flush(); ?>