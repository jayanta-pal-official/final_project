<?php
session_start();

if(!isset($_SESSION['u_loggedin'])){
    $_SESSION['warning'] = "Login to Access Products";
    header("location:user_login.php");
    exit;
}
?>