<?php
if (isset($_SESSION['user_roll'])) {
     if ($_SESSION['user_roll'] == 'adm' || $_SESSION['user_roll'] == 'user') {
         header('Location: userlanding.php');
     }
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login & registration System</title>
	<?php require 'src/inc/lib.inc.php' ?>

     <style>
     
          span.red {
               color: #DC3642;
          }
     
     </style>
    
</head>
<body>

<?php require 'src/inc/navbartop.php' ?>
<div id="cont" class="container mt-2">
     <div class="container text-white w-75 bg-dark pb-1">           
          <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete ="off">
               <h2 class="text-center">Sign Up</h2>
               <div class="form-group">
                    <input type ="text"  id="firstname" name="firstname"  class ="form-control"  placeholder ="Enter your first Name"  maxlength ="50"   value = ""  />               
                    <div   id="firstname_message" class="invalid-feedback"></div >
               </div>
               <div class="form-group">
                    <input type ="text"  id="lastname" name="lastname"  class ="form-control"  placeholder ="Enter your last Name"  maxlength ="50"   value = ""  />               
                    <div   id="lastname_message" class="invalid-feedback"></div >
               </div>
               <div class="form-group">
                    <input type ="text"  id="nickname" name="nickname"  class ="form-control"  placeholder ="Enter your Nickname"  maxlength ="50"   value = ""  />               
                    <div   id="nickname_message" class="invalid-feedback"></div >
               </div>
               <div class="form-group">     
                    <input   type = "email"  id= "email" name= "email"   class = "form-control"   placeholder = "Enter Your Email"   maxlength = "40"   value = ""  />          
                    <div   id="email_message" class="invalid-feedback"></div >
               </div>
               <div class="row">
                    <div class="col-lg-4">
                         <div class="d-flex justify-content-around"> 
                         <!-- Paul start used bootstrap custom radio to display them in red -->
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="genderM" name="gender" value="m">
                                <label class="custom-control-label" for="genderM">Male</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="genderF" name="gender" value="f">
                                <label class="custom-control-label" for="genderF">Female</label>
                              </div> 
                         <!-- Paul end -->
                         </div>                      
                    </div>
                    <div class="col-lg-8 d-flex justify-content-center">     
                    Date of birth <input   type = "date"   id="datebirth" name="datebirth"   class = "form-control"   placeholder = "YYYY-MM-DD"   maxlength = "40"   value = ""  />          
                    </div>
               </div>     
               <div class="form-group">               
                    <input   type = "password"  id = "password" name = "password"   class = "form-control"   placeholder = "Enter Password"   maxlength = "15"  />                    
                    <div   id="password_message" class="invalid-feedback"></div >
               </div>
               <!-- Paul start made an repeat password field -->
               <div class="form-group">               
                    <input   type = "password"  id = "password_re" name = "password_re"   class = "form-control"   placeholder = "Repeat Password"   maxlength = "15"  />                    
                    <div   id="password_re_message" class="invalid-feedback"></div >
               </div>
               <!-- Paul end -->
               <div class="form-group">
                    <!-- Paul start added span for file error msg since bootstrap had errors -->
                    <span id="pic_message">
                    Upload here your profile picture
                    </span>
                    <!-- Paul end -->
                    <input type="file" id="pic" name="pic">        
               </div>
               <div class="form-group">                    
                    <button   type = "button"  id="submit"  class = "btn btn-block btn-info"   name = "btn-signup" >Sign Up</button >
               </div>
          </form>
     </div>
</div> <!--end container-->
<!-- <hr id="footerregulator"> -->

<?php require 'src/inc/footer.php' ?>
<script src="src/js/ajaxRegister.js"></script>
</body>
</html>
