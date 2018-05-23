<?php

session_start();
require_once '../classes/User.php';
$obj = new USER;
$answer = $obj->signIn($_POST['uname'],$_POST['psw']);

if($answer) {
    $_SESSION['login'] = $answer['login'];

    header('Location:../home.php');
    die;
}
else{
    $_SESSION['error'] = 'There aren\'t such kind of login and password combination';
    echo $_SESSION['error'];
    header('Location:index.php');
    die;
}

