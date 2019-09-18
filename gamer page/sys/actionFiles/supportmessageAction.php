<?php

session_start();

require '../DBclasses.php';
require '../toolbox.php';

$send_supportMessage = new userClass;

$error = '';


if ($_POST['check1'] == '') {
    $error = $toolbox->assembleError($error,'Enter your type support','type');
}

if ($_POST['message'] == '') {
    $error = $toolbox->assembleError($error,'Enter your message','message');
}


if ($error == '') {

   

    $support_message_data = array(

        'support_message_from'    => $_SESSION['user_id'],
		'support_message_type'    => $_POST['check1'],
        'support_message_message' => $_POST['message']

        
    );

    echo $send_supportMessage->sendSupportMessagetoAdm($support_message_data);
}
echo $error;