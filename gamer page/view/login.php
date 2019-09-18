<?php 
    session_start(); 
    if (isset($_SESSION['user_roll'])) {
        if ($_SESSION['user_roll'] == 'adm' || $_SESSION['user_roll'] == 'user') {
            header('Location: userlanding.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php include 'src/inc/lib.inc.php'; ?>
</head>
<body>
<?php include 'src/inc/navbartop.php'; ?>   
<div class="container mt-2">
    <div class="container text-white w-50 bg-dark" style="padding-bottom: 8px; margin-top: 15%;"> 
        <form class="my-2" action="">
        <h2 class="text-center">Log In</h2>
            <div class="form-group">
                <label class="my-3" for="email">Email address</label>
                <input class="form-control" type="text" id="email" placeholder="e-mail address">
                <div id="email_message" class="invalid-feedback">Wrong email address.</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" placeholder="password">
                <div id="password_message" class="invalid-feedback">Invalid password.</div>
            </div>
                <div class="form-group">
                <button type="button" class="btn btn-info btn-block" id="submit">Log in</button>
                <a href="" class="text-white"><p>Forgot your password?</p></a>
            </div>
            <div class="form-group">
                <a href="register.php" role="button" class="btn btn-info btn-block" >Sign up here</button>
                </a>
            </div>      
            </div>                
        </form>
    </div>
</div><!--end of container-->
<?php include 'src/inc/footer.php'; ?>
<script src="src/js/ajaxLogin.js"></script>
</body>
</html>