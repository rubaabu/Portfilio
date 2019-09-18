<?php

require '../DBclasses.php';
require '../toolbox.php';

session_start();

$user = new userClass;
$toolbox = new toolbox;

if (isset($_POST['community_description'])) {
    $group_data = $_POST;
    
    if (isset($_FILES['pic'])) {
        $allowed_ext = array(
            'png',
            'jpg'
        );
    
        $result_file = $toolbox->checkFile($_FILES['pic'],'group',$allowed_ext);
    
        if (is_array($result_file)) {
            $toolbox->uploadFile($result_file[1],$result_file[0]);
            $group_data['community_img'] = $result_file[2];

            $group_data['community_owner'] = $_SESSION['user_id'];

            $user->createGroup($group_data);
            echo $group_id = $user->getGroupId($_POST['community_name']);
            $user->joinGroup($group_id,$_SESSION['user_id']);
        } else {
            echo 'fail';
        }
    } else {
        echo 'fail';
    }
}