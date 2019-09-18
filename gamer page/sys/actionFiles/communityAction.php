<?php
require '../DBclasses.php';
require '../toolbox.php';

session_start();
$user = new userClass;
$toolbox = new toolbox;

if (isset($_POST['group_id'])) {
    $error = '';

    if ($_POST['subject'] == '') {
        $error .= 'true';
    }
    
    if ($_POST['post_comment'] == '') {
        $error .= 'true';
    }
    
    if ($error == '') {
        $data = array(
            'fk_user_id' => $_SESSION['user_id'],
            'fk_community_id' => $_POST['group_id'],
            'post_subject' => $_POST['subject'],
            'post_comment' => $_POST['post_comment']
        );
        
        $allowed_ext = array(
            'jpg',
            'png'
        );
        
        $check_pic = $toolbox->checkFile($_FILES['pic'],'post',$allowed_ext);
        
        if (is_array($check_pic)) {
            $toolbox->uploadFile($check_pic[1],$check_pic[0]);
            $data['post_img'] = $check_pic[2];
        }
        
        $user->createPost($data);
    } else {
        echo 'fail';
    }
}

if (isset($_POST['joinGroup'])) {
    $user->joinGroup($_POST['joinGroup'],$_SESSION['user_id']);
}

if (isset($_POST['leaveGroup'])) {
    $user->leaveGroup($_POST['leaveGroup'],$_SESSION['user_id']);
}

if (isset($_POST['requestGroup'])) {
    $user->makeRequestGroup($_POST['requestGroup'],$_SESSION['user_id']);
}

if (isset($_POST['kickUser'])) {
    echo $user->leaveGroup($_POST['kickUser'],$_POST['usertokick']);
}

if (isset($_POST['deleteGroup'])) {
    echo $user->deleteGroup($_POST['deleteGroup']);
}