<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    $_SESSION['auth_status'] = "Login to Acess Dashboard";
    header("location:login.php");
    exit(0);
}else{
    if($_SESSION['loggedin'] == "1"){

    }else{
        $_SESSION['status'] = "You are not Authorised as ADMIN";
        header("location: ../index.php");
        exit(0);
    }
}
?>