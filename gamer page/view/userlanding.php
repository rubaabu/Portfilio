<?php

session_start();
if (!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
}
require '../sys/DBclasses.php';

$user = new userClass;

$my_friends_raw = $user->seeMyFriends($_SESSION['user_id']);

if ($my_friends_raw != 'no friends found') {
  $my_friends = array();
  foreach ($my_friends_raw as $key => $value) {
    foreach ($value as $key => $value) {
      $my_friends[] = array(
        'friend_id' => $key,
        'friend_name' => $value[0],
        'friend_img' => $value[1],
        'friend_status' => $value[2]
      );
    }
  }
} else {

}

$my_communities = $user->seeMyGroups($_SESSION['user_id']);

$my_messages = $user->get_messages($_SESSION['user_id']);

$my_posts = $user->getMyPosts($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Welcome <?php echo $_SESSION['user_nickname'] ?> </title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->
  <link href="src/inc/userland.css" rel="stylesheet">

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>

  <div class="d-flex flex-row-reverse" id="wrapper" >

    <!-- Sidebar -->
    <div class="bg-info" id="sidebar-wrapper">
      <div class="sidebar-heading text-center">Friends</div>
      <div class="list-group list-group-flush">
        <?php 
         
         if (isset($my_friends)) {
          foreach ($my_friends as $key => $value) {

            $value['friend_status'] == 'active' ? $status = 'on' : $status = 'off'; 

            echo '
            <a href="userprofile.php?userid='.$value['friend_id'].'" class="list-group-item bg-info p-1"><i class="'.$status.' fa fa-circle" aria-hidden="true"></i>
            <img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['friend_img'].'" alt="userpic">'.$value['friend_name'].'</a>
                      ';
          }
         } else {
           echo 'You have no friends :(';
         }

        ?>
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                    <div class="w-100">
                        <div id="communities" class="container bg-info">
                            <div class="h2 text-center">Communities</div>
                            <div class="row">
                              
                              <?php 
                                if (empty($my_communities)) {
                                  echo 'You are in no communities';
                                } else {
                                  foreach($my_communities as $key => $value)
                                  {
                                      echo '
                                          <div class="col-md-12 col-sm-12">
                                              <a class="text-decoration-none" href="community.php?community_id='.$value['community_id'].'">
                                                <div class="bg-dark card text-center text-white shadow-lg rounded mb-2">  
                                                  <img class="m-auto p-1 rounded" src="src/post_img/'.$value['community_img'].'" alt="" width="70">                  
                                                  <div class="card-body p-1">
                                                    <div class="card-title font-weight-bold m-0">'.$value['community_name'].'</div>
                                                    <p class="text-justify m-0">'.$value['community_description'].'</p>
                                                    <p class="text-left m-0"> <small>'.$value['community_member_status'].'</small></p>
  
                                                  </div>
                                                </div>
                                              </a>
                                          </div><!--end col card--> 
                                      ';
                                  } 
                                }                 
                              ?>
                             

                            </div>
                        </div>
                  </div>
              </div>  <!--end col -->
              <div class="col-md-6">
                  <div class="w-100 bg-dark" id="usermessages">
                        <div class="h4 text-white text-center">Posts</div>
                        <div class="list-group list-group-flush">
                        <?php 
                                if (!empty($my_posts)) {
                                  foreach($my_posts as $key => $value)
                                  {
                                      echo '
                                          <div class="list-group-item bg-info p-1">
                                            <a class="text-decoration-none" href="">
                                              <div class="card bg-dark shadow-lg rounded mb-2">  
                                                             
                                                  <div class="card-body text-white p-1">
                                                  <div class="text-decoration-none text-left font-weight-bold m-0">'.$value['post_subject'].' | '.$value['post_date_time'].' | '.$value['community_name'].'</div>
                                                  <p class="text-justify m-0">'.$value['post_comment'].'</p>
                                                  </div>';
  
                                                  if ($value['post_img'] != '') {
                                                    echo '<div class="text-center"><img class="m-auto p-1 rounded" src="src/post_img/'.$value['post_img'].'" alt="" height="20%" width="50%"></div>';
                                                  }
                                                  
                                                  echo '<p><a class="text-white" href=""><img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['user_img'].'" alt="userpic"> '.$value['user_nickname'].'</a>';
                                                  
                                                  if ($user->checkIfMyPost($_SESSION['user_id'],$value['post_id'])) {
                                                    echo '<button class="btn-info ml-2 post_delete" value="'.$value['post_id'].'"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button></p>'; 
                                                  }
  
                                              echo '</div>
                                            </a>
                                          </div><!--end list item card--> 
                                      ';
                                  }  
                                } else {
                                  echo 'There are no posts :(';
                                }                 
                              ?>
                       
                        </div>

                      
                  </div>
              </div>     
              <div class="col-md-3">
              <div class="h4 text-center text-white"><i class="fa fa-comments" aria-hidden="true"></i></div>
                  <div id="boxuser">
                    <?php 

                      foreach ($my_messages as $key => $value) {
                        echo '<p>
                          <small>'.$value['notification_date'].'</small> <br>
                          '.$value['notification_message'].'<br> From: '.$value['user_nickname'].'
                          <img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['user_img'].'" alt="userpic"> 
                          <button class="x btn-info delete_msg" value="'.$value['notification_id'].'">
                            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                          </button>
                        </p>
                        ';
                      }

                    ?>
                  </div><!--box-->
                      <div id="boxuser">
                        <form>
                          <div class="form-group">
                       
                              <input class="form-control-sm" id="user_nickname" placeholder="Gamer's Nickname" style="width:100%;">
                          
                              </select> 
                          </div>
                          <div class="form-group">
                              <label for="">Message</label>
                              <textarea class="form-control" type="textarea" id="message"></textarea>
                          </div> 
                          <div class="text-center">
                              <button class="btn btn-info py-0 px-5 icons" id="submit" type="button"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                          </div>      
                        </form>
                  </div><!--box-->
                  </div>
              </div>      
            </div><!--end row-->
        </div><!--end content fluid-->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include 'src/inc/footer.php'; ?>

  


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $('.delete_msg').click(function() {
      let msg_id = this.value;

      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userlandingAction.php',
        data: { delete_msg: msg_id }
      }).done(function(res) {
        location.reload();
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

    $('#submit').click(function() {
      let msg = document.querySelector('#message').value;
      let target_name = document.querySelector('#user_nickname').value;

      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userlandingAction.php',
        data: { post_send: target_name, post_message: msg }
      }).done(function(res) {
        if (res == 'fail') {
          window.alert('No user Found');
        } else if (res == 'fail1') {
          window.alert('Type something in the text area');
        } else if (res == 'fail2') {
          window.alert('You are not a friend of this user');
        } else {
          
          location.reload();
        }
      });
    });
  </script>

</body>

</html>
