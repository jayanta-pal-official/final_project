<?php
session_start();
include("./admin/config/dbcon.php");

if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password='$password' AND user_role = '0' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_details'] = [
            'user_name' => $row['name'],
            'user_email' => $row['email'],
            'user_id'=> $row['id'],
        ];
        $_SESSION['u_loggedin'] = true;
        $_SESSION['user_status'] = "Login Successfully";
        header("location: index.php");
        exit;
    } else {
        $_SESSION['massage'] = "Email and Password not matched ";
        header("location: ./user_login.php");
        exit;
    }
}
// sing up

if (isset($_REQUEST['add_user'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone_number = $_REQUEST['phone_number'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];
    if ($password == $confirm_password) {
        $check_email = "SELECT email FROM `user` WHERE email='$email' ";
        $check_result = mysqli_query($conn, $check_email);
        if (mysqli_num_rows($check_result) > 0) {
            $_SESSION['user_status'] = "Email Id allready exisest!";
            header("location: user_login.php");
            exit;
        } else {
            $sql = "INSERT INTO `user` (name,email,phone_number,password,user_role) VALUES ('$name','$email','$phone_number','$password','0')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['user_status'] = "successfully submitted";
                header("location: user_login.php");
                exit;
            } else {
                $_SESSION['user_status'] = "data not submitted";
                header("location: user_login.php");
                exit;
            }
        }
    } else {
        $_SESSION['user_status'] = "password and confirm password are different!";
        header("location: user_login.php");
        exit;
    }
}