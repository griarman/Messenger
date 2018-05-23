<?php

if($_POST['action'] === 'reg'){
    require_once 'reg.php';
}
if ($_POST['action'] === 'sign'){
    require_once 'auth.php';

}
