<?php
session_start();

if(!isset($_SESSION['u_loggedin'])){
    $_SESSION['warning'] = "Login to Access Products";
    header("location:user_login.php");
    exit;
}




// define("ADMIN_ROLE",1);
// define("USER_ROLE",0);
// define("LOGGED_IN",1);
// define("NOT_LOGGED_IN",1);

//echo "<pre>";
//print_r($_SESSION);
//var_dump(isset($_SESSION['u_loggedin']));
// if(is_logged_in()){









// else{
//     //die("ELSE BLOCK");
//     // if($_SESSION['u_loggedin'] == USER_ROLE){
//         if($_SESSION['u_loggedin'] == "0"){
        
//     }else{
//         $_SESSION['auth_user_status'] = "You are not Authorised as USER";
//         header("location: ./user_login.php");
//         exit(0);
//     }
// }
?>