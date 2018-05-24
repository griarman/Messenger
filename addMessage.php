<?php

    date_default_timezone_set('Asia/Yerevan');
    $date =  date('Y-m-d H:i:s');
    session_start();
    require_once 'classes/Messages.php';
    $obj = new Messages;
    $obj->addMessage(['senderId' => $_SESSION['login'],'getterId' => $_POST['username'], 'message' => $_POST['message'],'date' => $date]);


