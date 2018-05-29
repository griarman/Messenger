<?php

session_start();

require_once 'classes/User.php';
$obj = new User;
$answer = $obj->deleteCookie($_SESSION['login']);


session_destroy();
setcookie('tkn','',1,'/');
header('Location:index.php');

