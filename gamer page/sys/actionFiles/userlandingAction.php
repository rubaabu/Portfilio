<?php

require '../DBclasses.php';

session_start();
$user = new userClass;

if (isset($_POST['delete_msg'])) {

    echo $user->delete_message($_POST['delete_msg']);

}

if (isset($_POST['post_delete'])) {

    echo $user->deletePost($_POST['post_delete']);

}

if (isset($_POST['post_send'])) {

    $target_id = $user->getUserId($_POST['post_send']);

    if (empty($target_id)) {
        echo 'fail';
    } else {
        if ($_POST['post_message'] == '') {
            echo 'fail1';
        } else {
            $status = $user->friendStatusCheck($_SESSION['user_id'],$target_id);
            if ($status['status'] == 'active') {
                echo $user->send_message($_SESSION['user_id'],$target_id,$_POST['post_message']);
            } else {
                echo 'fail2';
            }
        }
    }

}