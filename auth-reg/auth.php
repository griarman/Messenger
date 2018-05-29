<?php

session_start();
require_once '../classes/User.php';
$obj = new User;
$_POST['name'] = addslashes($_POST['name']);
if(!isset($_POST['remember'])){
    $_POST['remember'] = false;
}
$answer = $obj->signIn($_POST['name'],$_POST['psw'],$_POST['remember']);

if($answer) {
    $_SESSION['login'] = $answer['login'];
    header('Location:../home.php');
    die;
}
else{
    $_SESSION['error'] = 'There arn\'t such kind of login and password combination';
    echo $_SESSION['error'];
    header('Location:../index.php');
    die;
}

