<?php

require '../DBclasses.php';

$user = new userClass;

session_start();

if (isset($_POST['accept'])) {
    $user->acceptFriendRequest($_POST['accept']);
}

if (isset($_POST['decline'])) {
    $user->deleteFriend($_POST['decline']);
}

if (isset($_POST['friend_request'])) {
    $data = array(
        'fk_user_id_1' => $_SESSION['user_id'],
        'fk_user_id_2' => $_POST['friend_request'],
        'friendship_status' => 'pending'
    );
    $user->makeFriendRequest($data);
}

if (isset($_POST['accept_group'])) {
    $user->acceptGroupRequest($_POST['accept_group']);
}

if (isset($_POST['decline_group'])) {
    $user->declineGroupRequest($_POST['decline_group']);
}