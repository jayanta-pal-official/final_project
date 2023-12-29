<?php
session_start();
unset($_SESSION['u_loggedin']);
unset($_SESSION['user_details']);
header("location: ./user_login.php");
?>