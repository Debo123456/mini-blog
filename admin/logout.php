<?php
//include config
require_once('../includes/core/init.php');
$user = new User1();
//log user out
$user->logout();
header('Location: index.php');

?>
