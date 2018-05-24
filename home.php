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
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/home.js"></script>

</head>
<body>
    <div id="container">
        <div id="left">
            <div id="title">Messages</div>
            <div id="users">
                <?php
                    require_once 'classes/User.php';
                    $obj = new User;
                    $users = $obj->getUsers($_SESSION['login']);
                    if($users){
                       for($i = 0; $i < count($users); $i++){
                          echo "<section class='friends'>{$users[$i]['login']}</section>";
                       }
                    }
                ?>
            </div>
        </div>
        <div id="right">
            <div id="name">
                <div>Name</div>
                <div><a href="exit.php">Log Out</a></div>
            </div>
            <div id="messages">
                <?php
//                    require_once 'addMessage.php';
                    require_once 'classes/Messages.php';
                    $obj = new Messages;
                ?>
            </div>
            <div id="inputHeader">
                <input type="text" placeholder="Введите сообщение..." id="sms">
                <button type="button" id="send">Отправить</button>
            </div>
        </div>
    </div>

</body>
</html>