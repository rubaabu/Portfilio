<?php
session_start();
require '../sys/DBclasses.php';
$user;
if(isset($_SESSION['user_roll'])) {
  $user = new userClass;
  if (!$user->adminOfGroup($_SESSION['user_id'],$_GET['community_id'])) {
    header('Location: userlanding.php');
  }
} else {
  header('Location: login.php');
}

$my_group_data = $user->getGroupInfo($_GET['community_id'])[0];

$group_games = $user->getGroupGames2($_GET['community_id']);
$all_games = $user->getAllGames();
$all_games_left = array();

foreach ($all_games as $key => $value) {
  $error = '';
  foreach ($group_games as $k => $v) {
    if ($value['game_name'] == $v['game_name']) {
      $error = 'true';
    }
  }
  if ($error == '') {
    $all_games_left[$key] = $value;
  }
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
  <div class="container-fluid">
    <div class="row">
      <div id="communityinfo" class="col-md-6 col-sm-12 m-2 rounded">
        <div id="head"><!--head-->
          <h4 class="text-center my-4"><?php echo $my_group_data['community_name']; ?></h4>
          <div class="d-flex justify-content-center mb-4">            
                <img class="img-fluid rounded-circle" height="90" width="90" src="src/post_img/<?php echo $my_group_data['community_img']; ?>" alt="userpic">
                      
          </div>
        </div><!--head-->
        <div id="bodycard" class="mt-2"><!--bodycard-->
           <form>
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="community_description" class="form-control" type="textarea" value="<?php echo $my_group_data['community_description']; ?>">
                </div>  
                <div class="form-group">
                    <label for="pic">Chose a new picture</label>
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
            <button class="btn btn-info" id="submit" type="button">Submit changes</button>
        </div>    
            </form>
            
                
                
        </div><!--bodycard-->
        
        
      </div><!--personal info-->


      <div id="postinfo" class="col bg-info m-2 rounded" style="width:100%; height:80vh">
          <div class="row mt-3">
              <div class="col">
              <div class="w-100 bg-dark rounded " id="">
              <div class="text-center row mt-2">
                <div  class="col">

                    <div class="rounded">
                        <div class="text-white">Existing Games</div>
                        <div id="editbox" class="bg-dark rounded">
                            <div class="row">
                            <!--loop would start here-->
                                    <?php

                                      foreach ($all_games_left as $key => $value) {
                                        echo '<img class="img-fluid rounded mt-2 addGame" height="70" width="70" src="src/post_img/'.$value['game_img'].'" title="'.$value['game_name'].'" alt="'.$value['game_id'].'">';
                                      }
                                    ?>
                            </div>

                    </div>  
                    </div>
                    <br>
                    <div class="rounded">
                        <div class="text-white">New Games to select</div>
                        <div id="editbox" class="bg-dark rounded">
                        <div class="row">
                            <!--loop would start here-->
                                <div class="col-md-3">
                                    <?php

                                      foreach ($group_games as $key => $value) {
                                        echo '<img class="img-fluid rounded mt-2 removeGame" height="70" width="70" src="src/post_img/'.$value['game_img'].'" title="'.$value['game_name'].'" alt="'.$value['game_id'].'">';
                                      }
                                    ?>
                                </div>
                            </div>   

                        </div>  
                    </div>                   
                                  
            </div><!--col-->                   
            </div><!--row-->                      
                </div>
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
      formData.append('community_id',<?php echo $_GET['community_id']; ?>);
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/editcommunityAction.php',
        data: formData,
        contentType: false,
        processData: false
      }).done(function(res) {
        location.reload();
        
      });
    });

    $('.removeGame').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/editcommunityAction.php',
        data: { removeGame: this.alt, community_id: <?php echo $_GET['community_id'] ?> }
      }).done(function() {
        location.reload();
      });
    });

    $('.addGame').click(function() {
      console.log(this.alt);
      
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/editcommunityAction.php',
        data: { addGame: this.alt, community_id: <?php echo $_GET['community_id'] ?> }
      }).done(function() {
        location.reload();
      });
    });
  </script>

</body>

</html>