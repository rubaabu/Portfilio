<?php

require '../DBclasses.php';

$user = new userClass;

$data = $user->searchUser($_POST['search']);

echo json_encode($data);