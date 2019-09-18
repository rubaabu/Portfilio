<?php

require '../DBclasses.php';
require '../toolbox.php';

session_start();
$user = new userClass;
$toolbox = new toolbox;

$profile_data = $_POST;


if (isset($_FILES['pic'])) {
    $allowed_ext = array(
        'png',
        'jpg'
    );
    
    $result_file = $toolbox->checkFile($_FILES['pic'],'avatar',$allowed_ext);

    if (is_array($result_file)) {
        $toolbox->uploadFile($result_file[1],$result_file[0]);
        $profile_data['user_img'] = $result_file[2];
        $_SESSION['user_img'] = $result_file[2];
    }
}

echo $user->editProfile($profile_data,$_SESSION['user_id']);