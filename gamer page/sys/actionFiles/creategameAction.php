<?php

session_start();

require '../DBclasses.php';
require '../toolbox.php';

$creategame = new userClass;
$toolbox = new toolbox;

$error = '';

$allowd_exts = array(
    'jpg',
    'png'
);



if ($_POST['name'] == '') {
    $error = $toolbox->assembleError($error,'Enter the name of the game','name');

}

if ($_POST['tag'] == '') {
    $error = $toolbox->assembleError($error,'Enter the tag of the game','tag');
    
}

$file_check_res = $toolbox->checkFile($_FILES['pic'],'game',$allowd_exts);
if (!is_array($file_check_res)) {
    $error = $toolbox->assembleError($error,'Choose game picture','pic');
}


if ($error == '') {

   $toolbox->uploadFile($file_check_res[1],$file_check_res[0]);

    $game_data = array(

        
        'game_name'              => $_POST['name'],
        'fk_game_tag_id'         => $_POST['tag'],
        'game_img'               => $file_check_res[2],
        'game_price'             => 0
        
    );

    echo $creategame->creategame($game_data);

   }
   echo $error; 