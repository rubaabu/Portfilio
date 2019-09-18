<?php

session_start();

require '../DBclasses.php';
require '../toolbox.php';

$banuser = new adminClass;
$toolbox = new toolbox;

$error = 'name';


if ($_POST['date'] == '') {
    $error = $toolbox->assembleError($error,'','date');

}

if ($error == 'name') {
     echo $banuser->banUser($_POST['name'],$_POST['date']);
}
 echo $error;