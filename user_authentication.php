<?php
session_start();
if(!isset($_SESSION['u_loggedin'])){
    $_SESSION['warning'] = "Login to Access Products";
    header("location:user_login.php");
    exit(0);
}
else{
    if($_SESSION['u_loggedin'] == "0"){
        
    }else{
        $_SESSION['auth_user_status'] = "You are not Authorised as USER";
        header("location: ./user_login.php");
        exit(0);
    }
}
?>