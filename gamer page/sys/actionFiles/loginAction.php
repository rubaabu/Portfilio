<?php

require '../DBfunctions.php';
require '../toolbox.php';

$login = new DBlogin;
$toolbox = new toolbox;

$error = '';
$credentials = array(
    'email' => $_POST['email'],
    'password' => $_POST['password']
);

if ($credentials['email'] == '') {
    $error = $toolbox->assembleError($error,'Please enter your Email!','email');
}

if ($credentials['password'] == '') {
    $error = $toolbox->assembleError($error,'Please enter your Password!','password');
}

if ($error == '') {

    $credentials['password'] = hash('sha256',$credentials['password']);

    $login_result = $login->checkCredentials($credentials);

    if ($login_result != 'fail') {
        
        $ban_check = $login->checkIfBanned($login_result['user_id']);

        if ($ban_check == 'safe') {

            session_start();

            foreach ($login_result as $key => $value) {
                if ($key == 'user_id' || $key == 'user_nickname' || $key == 'user_roll' || $key == 'user_date_birth' || $key == 'user_img') {
                    $_SESSION[$key] = $value;
                }
            }

            $login->makeLastLogin($_SESSION['user_id']);
    
            echo 'success';

        } else {
            $error = 'email/2sYou are Banned!/1spassword/2sYou are Banned!';
            echo $error;
        }

    } else {
        $error = 'email/2sInvalid Login!/1spassword/2sInvalid Login!';
        echo $error;
    }

} else {
    echo $error;
}