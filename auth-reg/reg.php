<?php

session_start();
require_once '../classes/User.php';
$obj = new User;
$answer = $obj->registration(['login' => $_POST['login'],'password' => $_POST['psw'],'retype' => $_POST['psw-repeat']]);

if($answer) {
    $_SESSION['login'] = $answer['login'];
    header('Localhost:home.php');
    die;
}
else{
    if($obj->isLoginExists($_POST['login'])){
        $_SESSION['error'] = 'This login exists';
    }
    else{
        $_SESSION['error'] = 'Please enter all fields right';
    }
    header('Localhost:index.php');
}