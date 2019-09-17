 <?php 
ob_start();
session_start(); //start a new session or continue the previous
if(isset($_SESSION['user'])!=""){ 
header("Location: home.php ");
}
include_once 'db.php';
$error = false;

$fullname        ="";
$nameError       ="";
$email           ="";
$emailError      ="";
$password        ="";
$passwordError   ="";
$telefon        ="";
$telError       ="";
$address        ="";
$addressError   ="";
$genderError    ="";
$statusError    ="";
$children       ="";
$childrenError  ="";
$nationality    ="";
$nationalityError="";
$education      ="";
$educationError ="";
$date_of_birth ="";
$dateerror ="";
//this post is when the person clicked in sign up
if(isset($_POST['btn-signup'])) {

    $fullname = trim($_POST['fullname']);
    $fullname = strip_tags($fullname);
    $fullname = htmlspecialchars($fullname);

    $date_of_birth = trim($_POST['date_of_birth']);


    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $telefon = trim($_POST['telefon']);
    $telefon = strip_tags($telefon);
    $telefon = htmlspecialchars($telefon);

    $address = trim($_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $gender = trim($_POST['gender']);

    $status = trim($_POST['status']);

    $children = trim($_POST['children']);
    $children = strip_tags($children);
    $children = htmlspecialchars($children);


    $nationality = trim($_POST['nationality']);
    $nationality = strip_tags($nationality);
    $nationality = htmlspecialchars($nationality);

    $education = trim($_POST['education']);
    $education = strip_tags($education);
    $education = htmlspecialchars($education);


    if(empty($fullname)) {
        $error = true;
        $nameError ="Please enter your full name.";
    } else if (strlen($fullname) < 5) {
        $error = true;
        $nameError = "Name must have at least 5 letters";
    } else if(!preg_match('/^[a-zA-Z\s]{1,50}$/',$fullname)) {
        $error  = true;
        $nameError = "Name must contain Alphapet and space";
    }

    if(empty($date_of_birth)) {
        $error = true;
        $dateerror = "Please enter your birthday.";
    }


    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email.";
    } else {
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if($count!=0){
            $error = true;
            $emailError = "Provided email is already in use.";
        }
    }

    if (empty($password)) {
        $error = true;
        $passwordError = "please enter password.";
    } 

    if(empty($telefon)) {
        $error = true;
        $telerror ="Please enter your telefon number.";
    } else if (strlen($telefon) < 5) {
        $error = true;
        $telError = "telefon number must be at least 9 num";
    }


    if(empty($address)) {
        $error = true;
        $addressError ="Please enter your home address.";
    } 

    if(empty($gender)) {
        $error = true;
        $genderError ="Please choose your gender.";
    } 

    if(empty($status)) {
        $error = true;
        $statusError ="Please choose your status.";
    } 


    if(empty($children)) {
        $error = true;
        $childrenError ="Please enter how many children you have.";
    } 
    
    if(empty($nationality)) {
        $error = true;
        $nationalityError ="Please enter your nationality.";
    } else if (strlen($nationality) < 2) {
        $error = true;
        $nationalityError = "Country must have at least 2 letters";
    } 


    if(empty($education)) {
        $error = true;
        $educationError ="Please enter your education.";
    } else if (strlen($education) < 2) {
        $error = true;
        $educationError = "education must have at least 2 letters";
    } 
    $password1 = hash('sha256' , $password);

if (!$error){
    $sql = "INSERT INTO users(fullname,date_of_birth,email,password,telefon,address,gender,
    status,children,nationality,education,date_of_start,role)VALUES('$fullname','$date_of_birth','$email','$password','$telefon','$address',
    '$gender','$status','$children','$nationality','$education','','user')";
    $result = mysqli_query($conn, $sql);

if($result){
	$errTyp = "success";
	$errMSG = "successfully registerd, you may login now";
	unset($name);
	unset($email);
	unset($password);
} else {
	$errTyp =" danger";
	$errMSG =" Something went wrong, try again later...";
}

}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registeration</title>
    </head>
    <body> 
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete ="off">
            <h2>Sign up</h2>
            <hr />

            <?php
            if(isset($errMsg)) {
                ?> 
                <div><?php echo $errMsg; ?> </div>
            <?php 
            }
            
            ?>


            
            <input type="text" name ="fullname" placeholder ="enter your fullname" maxlength="50" value="<?php echo $fullname; ?>" /><br>
            <span> <?php   echo  $nameError; ?> </span >


            <input type="date" name ="date_of_birth" placeholder="YYYY-MM-DD" maxlength="50" value="<?php echo $date_of_birth; ?>" /><br>
            <span> <?php   echo  $dateerror; ?> </span >

            <input type="email" name ="email" placeholder ="enter your email" maxlength="50" value="<?php echo $email; ?>" /><br>
            <span> <?php   echo  $emailError; ?> </span >

            <input type="password" name ="password" placeholder ="enter your password" maxlength="50" value="<?php echo $password; ?>" /><br>
            <span> <?php   echo  $passwordError; ?> </span >

            <input type="text" name ="telefon" placeholder ="enter your telefon" maxlength="50" value="<?php echo $telefon; ?>" /><br>
            <span> <?php   echo  $telError; ?> </span >

            <input type="text" name ="address" placeholder ="enter your address" maxlength="50" value="<?php echo $address; ?>" /><br>
            <span> <?php   echo  $addressError; ?> </span >

            <label>Gender:</label><br>
            <label for="gender">Female</label>
            <input type="radio" name ="gender" value="f" />

            <label for="gender">Male</label>    
            <input type="radio" name ="gender" value="m" /><br>

            <span> <?php   echo  $genderError; ?> </span ><br>


            <label>Status:</label><br>
            <label for="status">Married</label>
            <input type="radio" name ="status" value="Married" />

            <label for="status">Single</label>            
            <input type="radio" name ="status" value="single" /><br>

            <span> <?php   echo  $statusError; ?> </span ><br>

            <input type="text" name ="children" placeholder ="enter your children" maxlength="50" value="<?php echo $children; ?>" /><br>
            <span   class = "text-danger" > <?php   echo  $childrenError; ?> </span >

            <input type="text" name ="nationality" placeholder ="enter your nationality" maxlength="50" value="<?php echo $nationality; ?>" /><br>
            <span   class = "text-danger" > <?php   echo  $nationalityError; ?> </span >

            <input type="text" name ="education" placeholder ="enter your education" maxlength="50" value="<?php echo $education; ?>" /><br>
            <span   class = "text-danger" > <?php   echo  $educationError; ?> </span >

            <button type = "submit" name="btn-signup">Sign Up</button >

            <button type="button" ><a href="login.php">login</a></button>
            
            </form>


    </body>
</html>
<?php  ob_end_flush(); ?>

