<?php

require '../DBfunctions.php';
require '../toolbox.php';

$registration = new DBregistration;
$toolbox = new toolbox;

$error = '';

$allowd_exts = array(
    'jpg',
    'png'
);

//echo $toolbox->uploadFile($_FILES['pic'],'avatar',$allowd_exts);

if ($_POST['firstname'] == '') {
    $error = $toolbox->assembleError($error,'Enter your first name (50)','firstname');
} else {
    $pattern = '/^[a-zA-Z\s]{1,50}$/';
    if (!preg_match($pattern,$_POST['firstname'])) {
        $error = $toolbox->assembleError($error,'Only letters from a-z & A-Z (50)','firstname');
    }
}

if ($_POST['lastname'] == '') {
    $error = $toolbox->assembleError($error,'Enter your last name (50)','lastname');
} else {
    $pattern = '/^[a-zA-Z\s]{1,50}$/';
    if (!preg_match($pattern,$_POST['lastname'])) {
        $error = $toolbox->assembleError($error,'Only letters from a-z & A-Z (50)','lastname');
    }
}

if ($_POST['nickname'] == '') {
    $error = $toolbox->assembleError($error,'Enter your Nickname (30)','nickname');
} else {
    $pattern = '/^[a-zA-Z\s0-9_]{1,30}$/';
    if (!preg_match($pattern,$_POST['nickname'])) {
        $error = $toolbox->assembleError($error,'Only a-z, A-Z, 0-9 and _ (30)','nickname');
    } else if ($registration->doesUserExist($_POST['nickname'])) {
        $error = $toolbox->assembleError($error,'Username already exists','nickname');
    }
}

if ($_POST['email'] == '') {
    $error = $toolbox->assembleError($error,'Enter your Email (50)','email');
} else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 50) {
        $error = $toolbox->assembleError($error,'Enter valid Email (50)','email');
    } else if ($registration->doesEmailExist($_POST['email'])) {
        $error = $toolbox->assembleError($error,'This email is already in use (50)','email');
    }
}

if (!isset($_POST['gender'])) {
    $error = $toolbox->assembleError($error,'true','gender');
}

if ($_POST['datebirth'] == '') {
    $error = $toolbox->assembleError($error,'true','datebirth');
} else {
    $pattern = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}\z/';
    if (!preg_match($pattern,$_POST['datebirth'])) {
        $error = $toolbox->assembleError($error,'true','datebirth');
    }
}

if ($_POST['password'] == '') {
    $error = $toolbox->assembleError($error,'Enter a password','password');
}

if ($_POST['password_re'] != $_POST['password']) {
    $error = $toolbox->assembleError($error,"Passwords don't match",'password_re');
}

$file_check_res = $toolbox->checkFile($_FILES['pic'],'avatar',$allowd_exts);

if (!is_array($file_check_res)) {
    $error = $toolbox->assembleError($error,'Choose profile picture','pic');
}

if ($error == '') {

    $toolbox->uploadFile($file_check_res[1],$file_check_res[0]);

    $user_data = array(
        'user_nickname' => $_POST['nickname'],
        'user_roll' => 'user',
        'user_first_name' => $_POST['firstname'],
        'user_last_name' => $_POST['lastname'],
        'user_email' => $_POST['email'],
        'user_img' => $file_check_res[2],
        'user_gender' => $_POST['gender'],
        'user_date_birth' => $_POST['datebirth'],
        'user_password' => hash('sha256',$_POST['password']),
        'user_last_login' => '0000-00-00',
        'user_status' => 'offline'
    );

    $registration->addUserToDatabase($user_data);

}

echo $error;