<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("admin/config/dbcon.php");

if ( isset($_SESSION['u_loggedin']) AND $_SESSION['u_loggedin'] == true) {
  if (isset($_REQUEST['placeorder'])) {
    $id = $_REQUEST['id'];
    $firstname = $_REQUEST['firstname'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zip = $_REQUEST['zip'];
    $sql = "UPDATE user SET  name= '$firstname', email= '$email', address ='$address' ,city='$city', State='$state', pin='$zip' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {

      $last_id = $id;
      if (isset($_SESSION['cart'])) {
        $total_price = $_REQUEST['total_price'];
      }
      foreach ($_SESSION['cart'] as $key => $value) {
        $product_id = $key;
        $product_name = $value['ProductName'];
        $product_quentity = $value['quentity'];
        $product_price = $value['ProductPrice'];

        $sql_product_item = "INSERT INTO order_details (user_id,product_id,product_name,product_price,quantity,total_price)
      VALUES('$last_id','$product_id','$product_name','$product_price','$product_quentity','$total_price')";
        $result_item = mysqli_query($conn, $sql_product_item);
      }
      if ($result_item) {
        header('location:order_confirm.php');
        unset($_SESSION['cart']);
        exit;
      }
    }
  }
} else {
  if (isset($_REQUEST['placeorder'])) {
    $firstname = $_REQUEST['firstname'];
    $email = $_REQUEST['email'];
    $phone_number = $_REQUEST['phone_number'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zip = $_REQUEST['zip'];
    // random password generates
    function generateRandomPassword($length = 8)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $password = '';
      $charactersLength = strlen($characters);
      for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
      }
      return $password;
    }
    $randomPassword = generateRandomPassword(); // Generates a password of default length 8
      $sql = "INSERT INTO user (name,email,phone_number,password,address,city,State,pin) VALUES('$firstname','$email','$phone_number','$randomPassword','$address','$city','$state','$zip')";
      $result = mysqli_query($conn, $sql);
    if ($result) {
      $last_id = mysqli_insert_id($conn);
      // send mail for guest user.
      $subject = "Personal details ";
      $massage = "Hey, <b>".$_POST['firstname']."</b><br> Your account is successfully created. <br>  Email Id : " . $_POST['email'] . " <br> Password : " . $randomPassword;
      require 'phpmailer/src/Exception.php';
      require 'phpmailer/src/PHPMailer.php';
      require 'phpmailer/src/SMTP.php';
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'jayantapal9735@gmail.com'; // mail id
      $mail->Password = ''; //gmail app password 
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom('jayantapal9735@gmail.com');
      $mail->addAddress($_POST['email']);
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $massage;
      $mail->send();

      if (isset($_SESSION['cart'])) {
        $total_price = $_REQUEST['total_price'];
      }
      foreach ($_SESSION['cart'] as $key => $value) {
        $product_id = $key;
        $product_name = $value['ProductName'];
        $product_quentity = $value['quentity'];
        $product_price = $value['ProductPrice'];

        $sql_product_item = "INSERT INTO order_details (user_id,product_id,product_name,product_price,quantity,total_price)
      VALUES('$last_id','$product_id','$product_name','$product_price','$product_quentity','$total_price')";
        $result_item = mysqli_query($conn, $sql_product_item);
      }
      if ($result_item) {
        header('location:order_confirm.php');
        unset($_SESSION['cart']);
        exit;
      }
    }
  }
}
