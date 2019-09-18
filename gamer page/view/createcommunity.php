<?php
session_start();
require '../sys/DBclasses.php';
$user;
if(!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Community</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  <link href="src/inc/userland.css" rel="stylesheet">

  

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>
  <div class="container">
    <div class="row">
      <div id="communityinfo" class="container w-75 rounded mt-2 bg-info ">
        <div id="head"><!--head-->
          <h4 class="text-center my-4">Create Community</h4>
        </div><!--head-->
        <div id="bodycard" class="mt-2"><!--bodycard-->
           <form>
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="community_name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="community_description" class="form-control" type="textarea">
                </div>  
                <div class="form-group">
                    <label for="pic">Chose a community picture</label>
                    <input name="pic" class="form-control-sm" type="file" >
                </div>
                <div class="form-group">
                  <label>Group status</label>
                  <select name="community_status">
                    <?php
                      if ($my_group_data['community_status'] == 'open') {
                        echo '
                        <option value="closed">closed</option>
                        <option value="private">private</option>
                        <option value="open" selected>open</option>
                        ';
                      } else if ($my_group_data['community_status'] == 'private') {
                        echo '
                        <option value="closed">closed</option>
                        <option value="private" selected>private</option>
                        <option value="open">open</option>
                        ';
                      } else {
                        echo '
                        <option value="closed">closed</option>
                        <option value="private">private</option>
                        <option value="open">open</option>
                        ';
                      }
                    ?>
                  </select>
                </div>
            
              
            <div class="input-group-append">
            <button class="btn btn-dark" id="submit" type="button">Submit</button>
        </div>    
            </form>
            
                
                
        </div><!--bodycard-->
        
        
      </div><!--personal info-->
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
        url: '../sys/actionFiles/createcommunityAction.php',
        data: formData,
        contentType: false,
        processData: false
      }).done(function(res) {
        if (res == 'fail') {
          window.alert('Make sure everything is filled out');
        } else {
          window.location.href = 'userlanding.php';
        }
        
      });
    });
  </script>

</body>

</html>