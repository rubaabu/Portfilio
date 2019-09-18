<?php

require '../DBclasses.php';

$adm = new adminClass;

echo $adm->deleteSupport($_POST['submit']);