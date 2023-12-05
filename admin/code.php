<?php
session_start();
include("config/dbcon.php");
//add user
if (isset($_REQUEST['add_user'])) {
   $name = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $phone_number = $_REQUEST['phone_number'];
   $password = $_REQUEST['password'];
   $confirm_password = $_REQUEST['confirm_password'];
   if($password == $confirm_password){
      $check_email="SELECT email FROM `user` WHERE email='$email' "; 
      $check_result = mysqli_query($conn,$check_email);
     if(mysqli_num_rows($check_result)>0){
      $_SESSION['status'] = "Email Id allready exisest!";
      header("location: registered.php");
     }else{
      $sql = "INSERT INTO `user` (name,email,phone_number,password,user_role) VALUES ('$name','$email','$phone_number','$password','user')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
         $_SESSION['status'] = "successfully submitted";
         header("location: registered.php");
      } else {
         $_SESSION['status'] = "data not submitted";
         header("location: registered.php");
      }
     }

     
   } else {
      $_SESSION['status'] = "password and confirm password are different!";
      header("location: registered.php");
   }
}

//update user

if (isset($_REQUEST['update_user'])) {
   $id = $_REQUEST['id'];
   $update_name = $_REQUEST['name'];
   $update_email = $_REQUEST['email'];
   $update_phone_number = $_REQUEST['phone_number'];
   $update_password = $_REQUEST['password'];

   $update_query = " UPDATE `user` SET name='$update_name', email='$update_email', phone_number='$update_phone_number', password='$update_password' WHERE id=$id";
   $update_result = mysqli_query($conn, $update_query);
   if ($update_query) {
      $_SESSION['status'] = "User updatated successfully";
      header("location: registered.php");
   } else {
      $_SESSION['status'] = "User not updatated";

      header("location: registered.php");
   }
}
