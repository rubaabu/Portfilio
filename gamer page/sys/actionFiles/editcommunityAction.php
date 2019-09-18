<?php

require '../DBclasses.php';
require '../toolbox.php';

session_start();

$user = new userClass;
$toolbox = new toolbox;

if (isset($_POST['community_description'])) {
    $group_data = $_POST;
    $group_id = $group_data['community_id'];
    
    unset($group_data['community_id']);
    
    if (isset($_FILES['pic'])) {
        $allowed_ext = array(
            'png',
            'jpg'
        );
    
        $result_file = $toolbox->checkFile($_FILES['pic'],'group',$allowed_ext);
    
        if (is_array($result_file)) {
            $toolbox->uploadFile($result_file[1],$result_file[0]);
            $group_data['community_img'] = $result_file[2];
        }
    }
    
    $user->modifyGroup($group_data,$group_id);
}

if (isset($_POST['addGame'])) {
    echo $user->addGroupGame($_POST['community_id'],$_POST['addGame']);
}

if (isset($_POST['removeGame'])) {
    echo $user->removeGroupGame($_POST['community_id'],$_POST['removeGame']);
}