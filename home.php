<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
        die;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Messenger</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
</head>
<body>
    <div id="container">
        <div id="left">
            <div id="title">Messages</div>
            <div id="users"></div>
        </div>
        <div id="right">
            <div id="name">
                <div>Name</div>
                <div><a href="exit.php">Log Out</a></div>
            </div>
            <div id="messages"></div>
            <div id="inputHeader">
                <input type="text" placeholder="Введите сообщение...">
                <button type="button">Отправить</button>
            </div>
        </div>
    </div>

</body>
</html>