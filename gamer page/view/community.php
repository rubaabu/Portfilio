<?php
require '../sys/DBclasses.php';
session_start(); 
if (!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
}

$user = new userClass;

$group_members = $user->getGroupMembers($_GET['community_id']);

$group_info = $user->getGroupInfo($_GET['community_id'])[0];

$group_posts = $user->getGroupPosts($_GET['community_id']);

$group_games = $user->getGroupGames($_GET['community_id']);

$member_status = $user->amIInGroup($_SESSION['user_id'],$_GET['community_id']);

$var = 1;
if($var == 1)
{$badge = 'beginner.png';}
elseif($var == 2){$badge = 'intermediate.png';}
else{$badge = 'advanced.png';}
$comm = array('The Adventurers','Warriors','The Adventurers','Warriors','The Adventurers','Warriors');
$onlinefriends = array('FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName',);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $group_info['community_name'] ?></title>

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
          <h4 class="text-center"><?php echo $group_info['community_name'] ?></h4>
          <div class="d-flex justify-content-center">
            <div class="">
                <img class="img-fluid rounded-circle" height="90" width="90" src="src/post_img/<?php echo $group_info['community_img'] ?>" alt="userpic">
            </div><div class="my-auto">            
                
                <?php

                  if ($_SESSION['user_id'] == $group_info['community_owner']) {
                    echo '<button id="deleteGroup" class="btn btn-info">Delete Community</button>
                          <a href="editcommunity.php?community_id='.$_GET['community_id'].'"><button class="btn btn-info" type="button">Edit Community</button></a>
                    ';
                  } else if ($member_status['community_member_status'] == 'pending') {
                    echo '<button id="leaveGroup" class="btn btn-info">Cancel Request</button>';
                  } else if ($member_status['community_member_status'] == 'active') {
                    echo '<button id="leaveGroup" class="btn btn-info">Leave Community</button>';                    
                  } else {
                    if ($group_info['community_status'] == 'private') {
                      echo '<button id="requestGroup" class="btn btn-info">Member Request</button>';
                    } else if ($group_info['community_status'] == 'open') {
                      echo '<button id="joinGroup" class="btn btn-info">Join Community</button>';
                    } else {
                      echo 'Community is closed';
                    }
                  }

                ?>

             </div>   
          </div>
        </div><!--head-->
        <div id="bodycard" class="mt-2"><!--bodycard-->
            <div class="rounded list-group-flush mb-1">
                <div id="descrbox" class="bg-dark rounded">
                    <p><?php echo $group_info['community_description'] ?></p>
                </div>  
            </div>
            
              <?php

                if ($member_status['community_member_status'] == 'active') {

                  echo '<form action="">
                  <div class="h4">Make a post </div>
                    <div class="rounded form-group">
                        <div class="row mb-1">
                            <div class="col-4">
                            <input class="form-control" type="text" placeholder="Subject" name="subject">
                            </div>
                            <div class="col">
                                <input class="form-control-sm-file" type="file" name="pic">
                            </div>     
                        </div>
                        <div class="row">
                             <div class="col input-group">
                            <textarea class="form-control" type="text" placeholder="Post" name="post_comment"></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button" id="submit">Submit post</button>
                            </div>
                          </div>                                      
                        </div>
                    </div>
                </form>';

                }

              ?>

            <div class="rounded">
                <div id="gamesbox" class="bg-dark rounded">
                <!--this first div should be always there as it is the "title" of the panel-->
                <div class="inline rounded bg-info py-3" style="height=70px; width=70px;" >Games <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
                <!--this first div should be always there as it is the "title" of the panel-->
                
                  <?php

                    foreach ($group_games as $key => $value) {
                      echo '<img class="inline img-fluid img-thumbnail rounded-circle" height="70" width="70" src="src/post_img/'.$value['game_img'].'" alt="userpic">';
                    }

                  ?>

                </div>  
            </div>
                <div class="text-center row mt-2">
                  <div  class="col">
                    
                    <div id="memberbox" class="bg-dark rounded">
                    <!--this first div should be always there as it is the "title" of the panel-->
                    <div class="inline rounded bg-info py-3" style="height=70px; width=70px;" >Gamers <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
                    <!--this first div should be always there as it is the "title" of the panel-->
                      
                      <?php

                        foreach ($group_members as $key => $value) {
                          echo '
                            <div class="inline rel">
                              <a href="userprofile.php?userid='.$value['user_id'].'">
                              <img class="inline img-fluid img-thumbnail rounded-circle" height="70" width="70" src="src/post_img/'.$value['user_img'].'" alt="userpic" data-toggle="popover" data-trigger="hover" title="'.$value['user_nickname'].'">
                              </a>';
                              
                              if ($_SESSION['user_id'] == $group_info['community_owner'] && $_SESSION['user_id'] != $value['user_id']) {
                                echo '<button class="coverbtn abs btn-info kickUser" value="'.$value['user_id'].'"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>';
                              }

                              echo '</div>
                          ';
                        }

                      ?>

                    </div>                  
                  </div><!--col-->                   
                </div><!--row-->
                
        </div><!--bodycard-->
        
      </div><!--personal info-->


      <div id="postinfo" class="col bg-info m-2 rounded" style="width:100%; height:80vh">
          <div class="row mt-3">
              <div class="col">
              <div class="w-100 bg-dark rounded " id="usermessages">
                        <div class="h4 text-white text-center">Posts</div>
                        <div class="list-group list-group-flush">
                        <?php 
                                if (!empty($group_posts)) {
                                  foreach($group_posts as $key => $value)
                                  {
                                      echo '
                                          <div class="list-group-item bg-info p-1">
                                            <a class="text-decoration-none" href="">
                                              <div class="card bg-dark shadow-lg rounded mb-2">  
                                                             
                                                  <div class="card-body text-white p-1">
                                                  <div class="text-decoration-none text-left font-weight-bold m-0">'.$value['post_subject'].' | '.$value['post_date_time'].'</div>
                                                  <p class="text-justify m-0">'.$value['post_comment'].'</p>
                                                  </div>';
  
                                                  if ($value['post_img'] != '') {
                                                    echo '<div class="text-center"><img class="p-1 rounded" src="src/post_img/'.$value['post_img'].'" alt="" height="20%" width="50%"></div>';
                                                  }
                                                  
                                                  echo '<p><a class="text-white" href="userprofile.php?userid='.$value['user_id'].'"><img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['user_img'].'" alt="userpic"> '.$value['user_nickname'].'</a>';
                                                  
                                                  if ($user->checkIfMyPost($_SESSION['user_id'],$value['post_id']) || $_SESSION['user_id'] == $group_info['community_owner']) {
                                                    echo '<button class="btn-info ml-2 post_delete" value="'.$value['post_id'].'" value="'.$value['user_id'].'"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button></p>'; 
                                                  }
  
                                              echo '</div>
                                            </a>
                                          </div><!--end list item card--> 
                                      ';
                                  }  
                                } else {
                                  echo '<div class="text-white ml-2">There are no posts :(</div>';
                                }                             
                              ?>
                       
                        </div>

                      
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
      formData.append('group_id', <?php echo $_GET['community_id'] ?>);

      $.ajax({
          method: 'POST',
          url: '../sys/actionFiles/communityAction.php',
          data: formData,
          contentType: false,
          processData: false
      }).done(function(res) {
          if (res == 'fail') {
            window.alert("Do not leave the subject or the comment empty!");
          } else {
            location.reload();
          }
      });

    });

    $('.post_delete').click(function() {
      let msg_id = this.value;

      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userlandingAction.php',
        data: { post_delete: msg_id }
      }).done(function(res) {
        location.reload();
      });
    });

    $('#joinGroup').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/communityAction.php',
        data: { joinGroup: <?php echo $_GET['community_id'] ?> }
      }).done(function(res) {
        location.reload();
      });
    });

    $('#leaveGroup').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/communityAction.php',
        data: { leaveGroup: <?php echo $_GET['community_id'] ?> }
      }).done(function(res) {
        location.reload();
      });
    });

    $('#deleteGroup').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/communityAction.php',
        data: { deleteGroup: <?php echo $_GET['community_id'] ?> }
      }).done(function(res) {
        //console.log(res);
        
        window.location.href = 'userlanding.php';
      });
    });

    $('.kickUser').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/communityAction.php',
        data: { kickUser: <?php echo $_GET['community_id'] ?>, usertokick: this.value }
      }).done(function(res) {
        console.log(res);
        
        location.reload();
      });
    });

    $('#requestGroup').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/communityAction.php',
        data: { requestGroup: <?php echo $_GET['community_id'] ?> }
      }).done(function(res) {
        location.reload();
      });
    });
  </script>

</body>

</html>