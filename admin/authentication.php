<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    $_SESSION['auth_status'] = "Login to Acess Dashboard";
    header("location:login.php");
}
?>