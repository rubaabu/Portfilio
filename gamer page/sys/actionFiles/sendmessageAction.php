<?php

session_start();

require '../DBclasses.php';
require '../toolbox.php';

$sendmessage = new userClass;
$toolbox = new toolbox;

$error = '';


if ($_POST['message'] == '') {
    $error = $toolbox->assembleError($error,'Write a message','message');

}

if ($error == '') {

    $message_data = array(

        'notification_id'        => $_SESSION['user_id'],
        'notification_from'      => 1,
        'notification_to'        => 5,
		'notification_message'   => $_POST['message'],
        'notification_date'      => $_POST['date']
        

        
    );
     echo $sendmessage->send_message($message_data);
}
 echo $error;