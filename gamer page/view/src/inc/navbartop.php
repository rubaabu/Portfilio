<?php

if (isset($_SESSION['user_roll'])) {
  if ($_SESSION['user_roll'] == 'adm') {
    require 'navadm.php';
  } elseif ($_SESSION['user_roll'] == 'user') {
    require 'navuser.php';
  }
} else {
  require 'navindex.php';
}

