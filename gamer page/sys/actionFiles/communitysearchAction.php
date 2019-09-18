<?php

require '../DBclasses.php';

$user = new userClass;

if (isset($_POST['search'])) {
    $data = $user->searchGroup($_POST['search']);

    echo json_encode($data);
}

if (isset($_POST['get_tags'])) {
    $data = $user->getGroupTags($_POST['get_tags']);

    echo json_encode($data);
}