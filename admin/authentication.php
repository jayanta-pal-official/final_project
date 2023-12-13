<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['auth_status'] = "Login to Access Dashboard";
    header("location:login.php");
    exit;
}
