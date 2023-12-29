<?php
session_start();
include("admin/config/dbcon.php");

if ($_SESSION['u_loggedin'] == true) {
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
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zip = $_REQUEST['zip'];
    $sql = "INSERT INTO user (name,email,address,city,State,pin) VALUES('$firstname', '$email','$address','$city','$state','$zip')";
    $result = mysqli_query($conn, $sql);
    if ($result) {

      $last_id = mysqli_insert_id($conn);
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
