<?php
include("config/dbcon.php");
include("./authentication.php");
include("common.fn.admin.php");

//Insert user
if (isset($_REQUEST['add_user'])) {
   $name = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $phone_number = $_REQUEST['phone_number'];
   $password = $_REQUEST['password'];
   $confirm_password = $_REQUEST['confirm_password'];
   insertFunction($conn, $name, $email, $phone_number, $password, $confirm_password);
}

//Update user
if (isset($_REQUEST['update_user'])) {
   $id = $_REQUEST['id'];
   $update_name = $_REQUEST['name'];
   $update_email = $_REQUEST['email'];
   $update_phone_number = $_REQUEST['phone_number'];
   $update_user_role = $_REQUEST['user_role'];
   updateFunction($conn, $id, $update_name, $update_email, $update_phone_number, $update_user_role);
}

//Logout user
if (isset($_REQUEST['logout_user'])) {
logoutFunction();
}