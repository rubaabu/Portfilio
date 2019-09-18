<?php 
  session_start();
  if (!isset($_SESSION['user_roll'])) {
    header('Location: login.php');
  }
  require '../sys/DBclasses.php';

  $user = new userClass;

  $user_data;
  $user_groups;

  if (isset($_GET['userid'])) {

    $user_data = $user->getUserData($_GET['userid']);
    $user_groups = $user->seeMyGroups($_GET['userid']);

  }

  if ($user_data['user_badge'] == 'intermediate') {
    $badge = 'intermediate.png';
  } elseif ($user_data['user_badge'] == 'advanced') {
    $badge = 'advanced.png';
  } else {
    $badge = 'beginner.png';
  }

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
          <h4 class="text-center"> <?php echo $user_data['user_nickname'] ?> </h4>
          <h5 class="text-center"><?php echo $user_data['user_first_name'].' '.$user_data['user_last_name'] ?></h5>
          <div class="text-center">
            <img class="img-fluid img-thumbnail rounded-circle" height="100" width="100" src="src/post_img/<?php echo $user_data['user_img'] ?>" alt="userpic">
            <div>
                  <?php

                    $result_friend = $user->friendStatusCheck($_SESSION['user_id'],$_GET['userid']);

                    if ($result_friend['status'] == 'active') {
                      echo '<button class="btn btn-dark decline" value="'.$result_friend['id'].'">Remove Friend</button>';
                    } elseif ($result_friend['status'] == 'pending' && $_SESSION['user_id'] != $_GET['userid']) {
                      if ($user->didIRequest($_SESSION['user_id'],$_GET['userid'])) {
                        echo '<button class="btn btn-dark decline" value="'.$result_friend['id'].'">Cancel Request</button>';
                      } else {
                        echo 'Requested';
                      }
                    } else if ($_SESSION['user_id'] == $_GET['userid']) {
                      echo '<a href="edituserprofile.php"><button class="btn btn-dark">Edit Profile</button></a>';
                    } else {
                      echo '<button class="btn btn-dark friend_request" value="'.$_GET['userid'].'">Friend Request</button>';
                    }

                  ?>
            </div>
          </div>
        </div><!--head-->
        <div id="bodycard" class="mt-2"><!--bodycard-->
            <div class="rounded list-group-flush">
              <div class="list-group-item bg-dark text-white py-1"><?php echo $user_data['user_email'] ?></div>
              <div class="list-group-item bg-dark text-white py-1"><?php $str = explode(' ',$user_data['user_date_birth']); echo $str[0]  ?></div>
              <div class="list-group-item bg-dark text-white py-1"><?php $user_data['user_description'] == '' ? print('No description') : print($user_data['user_description']) ; ?></div>
              <div class="list-group-item bg-dark text-white py-1">User last logged in:  <?php echo $user_data['user_last_login'] ?></div>
            </div>
                <div class="text-center row mt-2">
                  <div class="col-md-3">
                    <p>Badges</p>
                    <div id="userbadge" class="bg-dark rounded">                     
                        <img class="img-fluid rounded mt-2" height="70" width="70" src="src/img/<?php echo $badge?>" alt="userpic">
                    </div>    
                  </div>
                  <div  class="col-md-9">
                    <p>communities</p>
                    <div id="usercommunities" class="bg-dark rounded">
                      <?php

                        foreach ($user_groups as $key => $value) {
                          echo '<a href="community.php?community_id='.$value['community_id'].'"><img class="img-fluid rounded" height="70" width="70" src="src/post_img/'.$value['community_img'].'" alt="comm_pic" title="'.$value['community_name'].'"></a>';
                        }

                      ?>
                    </div>                  
                  </div><!--col-->                   
                </div><!--row-->
                
        </div><!--bodycard-->
        
      </div><!--personal info-->


      <?php

        if ($user_data['user_id'] == $_SESSION['user_id']) {

          $my_friend_requests = $user->seeMyFriendRequests($_SESSION['user_id']);

          echo '<div id="generalinfo" class="col m-2 rounded text-white" style="width:100%; height:80vh">
                <div class="row">
                    <div class="col">
                        <div class="h4 text-center">Friend requests</div>
                        <div id="box" class="text-white">';
                              
          if (empty($my_friend_requests)) {
            echo 'No one wants to be your friend 😳😱';
          } else {
            foreach ($my_friend_requests as $key => $value) {
              echo '<p>
                <a class="text-white" href="">'.$value['user_nickname'].' 
                  <img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['user_img'].'" alt="userpic"> 
                </a>
                Wants to be your friend
                <button class="y btn-info accept" value="'.$value['friendship_id'].'">
                  <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                </button>
                <button class="x btn-info decline" value="'.$value['friendship_id'].'">
                  <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                </button>
              </p>';
            }
          }

          if ($user->amIaGroupAdmin($_SESSION['user_id'])) {
            echo'          </div><!--box-->
            <div class="h4 text-center">Members requests</div>
                    <div id="memberrequestbox" class="text-white">';
  
                        $result_group_requests = $user->getGroupRequests($_SESSION['user_id']);
  
                        foreach ($result_group_requests as $key => $value) {
                          echo '<p>'.$value['user_nickname'].' wants to be in '.$value['community_name'].' <img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'.$value['user_img'].'" alt="userpic"> <button class="y btn-info accept_group" value="'.$value['community_member_id'].'"><i class="fa fa-check-circle-o" aria-hidden="true"></i></button><button class="x btn-info decline_group" value="'.$value['community_member_id'].'"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button></p>';
                        }
  
                    echo'</div><!--box-->
                ';
          }

          echo '
          </div><!--flex column-->
          </div><!--col-->
          </div>
        </div><!--general info-->';

        }

      ?>


    </div><!--row-->
  </div><!--container-->

<?php include 'src/inc/footer.php'; ?>

  


 
  <script>
    $('.accept').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userprofileAction.php',
        data: { accept: this.value }
      }).done(function() {
        location.reload();
      });
    });

    $('.decline').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userprofileAction.php',
        data: { decline: this.value }
      }).done(function() {
        location.reload();
      });
    });

    $('.friend_request').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userprofileAction.php',
        data: { friend_request: this.value }
      }).done(function() {
        location.reload();
      });
    });

    $('.accept_group').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userprofileAction.php',
        data: { accept_group: this.value}
      }).done(function() {
        location.reload();
      });
    });

    $('.decline_group').click(function() {
      $.ajax({
        method: 'POST',
        url: '../sys/actionFiles/userprofileAction.php',
        data: { decline_group: this.value }
      }).done(function() {
        location.reload();
      });
    });
  </script>

</body>

</html>