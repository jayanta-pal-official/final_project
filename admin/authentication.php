<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    $_SESSION['status'] = "Login to Acess Dashboard0";
    header("location:login.php");
}
?>