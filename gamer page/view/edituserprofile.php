<?php 
session_start();
if (!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
}

require '../sys/DBclasses.php';

$user = new userClass;

$my_data = $user->getUserData($_SESSION['user_id']);

                  $var = 1;
                  if($var == 1)
                  {$badge = 'beginner.png';}
                  elseif($var == 2){$badge = 'intermediate.png';}
                  else{$badge = 'advanced.png';}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Profile</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>
  <div class="container">
    <div class="row">
      <div id="personalinfo" class="col bg-info m-2 rounded"style="width:100%; height:80vh">
        <div id="head"><!--head-->
          <div class="h3 text-white text-center">Edit your personal information</div>
          <form action="">
           
            <div class="form-group"> 
            <div class="row">
                <div class="col">
                <input name="user_first_name" type="text" class="form-control" placeholder="First name" value="<?php echo $my_data['user_first_name']; ?>">
                </div>
                <div class="col">
                <input name="user_last_name" type="text" class="form-control" placeholder="Last name" value="<?php echo $my_data['user_last_name']; ?>">
                </div>
                </div>
          </div>
          <div class="row">
            <div class="col">
                <div class="text-center">
                    <img name="pic" class="img-fluid img-thumbnail rounded-circle" height="100" width="100" src="src/post_img/<?php echo $my_data['user_img']; ?>" alt="userpic">
                </div>
            </div>
            <div class="col my-auto">
                <input name="pic" type="file" class="form-control-sm">
            </div>
          </div>
        </div><!--head-->
        <div id="bodycard" class="mt-2"><!--bodycard-->
            
            
            <div class="form-group">
                <input name="user_date_birth" class="form-control" type="date" placeholder="date_birth" value="<?php $str = explode(' ',$my_data['user_date_birth']); echo $str[0]; ?>">
            </div>
            <div class="form-group">
                <input name="user_description" type="text" class="form-control" placeholder="Description" <?php if ($my_data['user_description'] != '') { echo 'value="'.$my_data['user_description'].'"'; } ?>>
            </div>
              
            
                             
        </div><!--bodycard-->        
      </div><!--personal info-->
      

      <div id="generalinfo" class="col m-2 rounded text-white" style="width:100%; height:80vh">
          <div class="row">
              <div class="col">
              <div class="flex-column">
                  
              <div class="text-center row mt-2">
                  <div class="col-md-12">
                    <p>Pick your new badge</p>
                    <div id="userbadge" class="bg-dark rounded d-flex justify-content-around">
                        <div>
                        <input class="form-check-input" type="radio" name="user_badge" value="begginer">                     
                        <img class="img-fluid rounded mt-2" height="70" width="70" src="src/img/beginner.png" alt="userpic">
                        </div>
                        <div>
                        <input class="form-check-input" type="radio" name="user_badge" value="intermediate">
                        <img class="img-fluid rounded mt-2" height="70" width="70" src="src/img/intermediate.png" alt="userpic">
                        </div>
                        <div>
                        <input class="form-check-input" type="radio" name="user_badge" value="advanced">
                        <img class="img-fluid rounded mt-2" height="70" width="70" src="src/img/advanced.png" alt="userpic">
                        </div>
                    </div>  
                    <div class="mt-3">
                  <button class="btn btn-info" type="button" id="submit">Submitt the changes</button>
                </div>  
                  </div>
                  </form>               
                </div><!--row-->  
                  
                 
              </div><!--flex column-->
              </div><!--col-->
              
          </div>
      </div><!--general info-->
    </div><!--row-->
  </div><!--container-->

<?php include 'src/inc/footer.php'; ?>

  


 
  <script>
    $('#submit').click(function() {
      let form = document.getElementsByTagName('form')[0];

      let formData = new FormData(form);

      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/edituserprofileAction.php',
        data: formData,
        contentType: false,
        processData: false
      }).done(function(res) {
        window.location.href = 'userprofile.php?userid=<?php echo $_SESSION['user_id'] ?>';
      });
    });
  </script>

</body>

</html>