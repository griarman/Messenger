<?php
session_start();
    if(isset($_COOKIE['tkn'])){
        require_once 'classes/User.php';
        date_default_timezone_set('Asia/Yerevan');
        $obj = new User;
        $answer = $obj->checkCookie($_COOKIE['tkn'],time());
        if($answer){
            $_SESSION['login'] = $answer['userId'];
            header('Location:home.php');
            die;
        }
        echo "<div class='danger'>PLEASE DON'T TRY TO DO SUCH AWFUL THINGS</div>";
        die;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Messenger</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/main.js"></script>

</head>
<body>
	<form action="auth-reg/auth.php" id="form1" method="post">
		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="name" id="uname" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" id="psw" required>

		<button type="submit">Login</button>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</label>
        <?php

        if(isset($_SESSION['error'])){
            echo "<div class='error'>{$_SESSION['error']}</div>";
        }
        session_unset();
        ?>
	  </div>
	  	<div class="container signin">
            <p>You hadn't an account? <span id="reg">Sign up</span>.</p>
		</div>

	</form>
    <form action="auth-reg/reg.php" id="form2" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Login</b></label>
            <input type="text" placeholder="Enter Login" name="login" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <hr>

            <button type="submit" class="registerbtn">Register</button>
            <?php

            if(isset($_SESSION['error'])){
                echo "<div class='error'>{$_SESSION['error']}</div>";
            }
            session_unset();
            ?>
        </div>
        <div class="container signin">
            <p>Already have an account? <span id="sign">Sign in</span>.</p>
        </div>
    </form>
</body>
</html>