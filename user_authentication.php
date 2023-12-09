<?php
session_start();
if(!$_SESSION['user_loggedin']){
    $_SESSION['warning'] = "Login to Access Products";
    header("location:user_login.php");
    exit(0);
}
else{
    
}
?>