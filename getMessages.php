<?php
session_start();
require_once 'classes/Messages.php';
$obj = new Messages;
$messages = $obj->getMessages(['senderId' => $_SESSION['login'], 'getterId' => $_POST['userName']]);

$messages = json_encode($messages);
echo $messages;