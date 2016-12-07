<?php
session_start();

if(isset($_COOKIE['login'])) {
    
    setcookie('login', "", 1);
    setcookie('login', false);
    unset($_COOKIE['login']);
    
    $_SESSION["notification"]='U bent uitgelogd. Tot de volgende keer';
    
}else{
    header("location:login.php");
}
?>