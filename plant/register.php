 <?php 

include_once 'db.php';
$error = false;

$fullname        ="";
$nameError       ="";
$email           ="";
$emailError      ="";
$password1       ="";
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

    // $gender = trim($_POST['gender']);

    // $status = trim($_POST['status']);

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
        $telError ="Please enter your telefon number.";
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
    status,children,nationality,education,date_of_start,role)VALUES('$fullname','$date_of_birth','$email','$password1','$telefon','$address',
    '$gender','$status','$children','$nationality','$education','','user')";
    $result = mysqli_query($conn, $sql);

if($result){
	$errTyp = "success";
	$errMSG = "successfully registerd, you may login now";
	// unset($fullname);
	// unset($email);
	// unset($password1);
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

@import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
  background-color: #d0ecf0;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
a {
    color: #17a2b8;
 
 }

 .span {
    color: red;
 }
}


</style>



    </head>
    <body> 



    <div class="container">
    <h1 class="well" style="color:#17a2b8;">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete ="off">
 <?php
            if(isset($errMSG)) {
                ?> 
                <div class="span"><?php echo $errMSG; ?></div>
            <?php 
            }
            
            ?>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>FullName</label>
								<input type="text" placeholder="Enter your fullname here.." name ="fullname" value="<?php echo $fullname; ?>" class="form-control">
                                <span class="span"> <?php   echo  $nameError; ?> </span  >

							</div>
							<div class="col-sm-6 form-group">
								<label>date of birth</label>
								<input name="date_of_birth" value="<?php echo $date_of_birth; ?>" type="date" placeholder="Enter Last Name Here.." class="form-control">
                                <span class="span"> <?php   echo  $dateerror; ?> </span >
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" value="<?php echo $address; ?>" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                            <span class="span"> <?php   echo  $addressError; ?> </span >
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Children</label>
								<input name="children" value="<?php echo $children; ?>" type="text" placeholder="Enter number Here.." class="form-control">
                                <span class="span"> <?php   echo  $childrenError; ?> </span >
							</div>	
							<div class="col-sm-4 form-group">
								<label>Nationality</label>
								<input name="nationality" value="<?php echo $nationality; ?>" type="text" placeholder="Enter State Name Here.." class="form-control">
                                <span class="span"> <?php   echo  $nationalityError; ?> </span >
							</div>	
							<div class="col-sm-4 form-group">
								<label>Education</label>
								<input name="education" value="<?php echo $education; ?>" type="text" placeholder="Enter Zip Code Here.." class="form-control">
                                <span class="span"> <?php   echo  $educationError; ?> </span >
							</div>		
                           
						</div>
							
                        <div class="form-group">
                            <label >Status:</label><br>
                            <label for="status" value="<?php echo $status; ?>">Married</label>
                            <input type="radio" name ="status" value="Married" />

                            <label for="status" value="<?php echo $status; ?>">Single</label>            
                            <input type="radio" name ="status" value="single" /><br>

                            <span class="span"> <?php   echo  $statusError; ?> </span ><br>
                        </div>
                         <div class="form-group">
                                     <label>Gender:</label><br>
                                    <label name ="gender" for="gender">Female</label>
                                    <input type="radio" name ="gender" value="f" />

                                    <label name ="gender" for="gender">Male</label>    
                                    <input type="radio" name ="gender" value="m" /><br>

                                    <span class="span"> <?php   echo  $genderError; ?> </span ><br>

                            </div>
					<div class="form-group">
						<label>Phone Number</label>
						<input name="telefon" value="<?php echo $telefon; ?>" type="text" placeholder="Enter Phone Number Here.." class="form-control">
                        <span class="span"> <?php   echo  $telError; ?> </span>
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input name="email" value="<?php echo $email; ?>" type="text" placeholder="Enter Email Address Here.." class="form-control">
                        <span class="span"> <?php   echo  $emailError; ?> </span>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input name="password" value="<?php echo $password; ?>" type="password" placeholder="Enter Email Address Here.." class="form-control">
                        <span class="span"> <?php   echo  $passwordError; ?> </span >
					</div>	
                    <button type ="submit" name="btn-signup" class="btn btn-lg btn-info" >Sign Up</button >
									<a href="login.php">login</a>
					</div>
                    
               
				</form> 
				</div>
	</div>
	</div>

    <?php require 'footer.php'; ?>


    </body>
</html>
<?php  ob_end_flush(); ?>

