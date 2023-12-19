<?php
session_start();
include("admin/config/dbcon.php");

// if($_SESSION['u_loggedin'] == true){
//   if(isset($_REQUEST['placeorder'])){
//     $firstname= $_REQUEST['firstname'];
//     $email=$_REQUEST['email'];
//     $address= $_REQUEST['address'];
//     $city=$_REQUEST['city'];
//     $state= $_REQUEST['state'];
//     $zip =$_REQUEST['zip'];
//   $sql= "UPDATE user SET address ='$address' ,city='$city', State='$state', pin='$zip' ";
//     $result=mysqli_query($conn,$sql);
//     if($result){
//        header('location:order_confirm.php');
//        exit;
//     }
// }
// }else{
  if(isset($_REQUEST['placeorder'])){
    $firstname= $_REQUEST['firstname'];
    $email=$_REQUEST['email'];
    $address= $_REQUEST['address'];
    $city=$_REQUEST['city'];
    $state= $_REQUEST['state'];
    $zip =$_REQUEST['zip'];
  $sql= "INSERT INTO user (name,email,address,city,State,pin) VALUES('$firstname', '$email','$address','$city','$state','$zip')";
    $result=mysqli_query($conn,$sql);
    if($result){
      $last_id = mysqli_insert_id($conn);
      $product_id = $_REQUEST['product_id'];
      $product_name= $_REQUEST['product_name'];
      $product_quentity= $_REQUEST['product_quentity'];
      $product_price= $_REQUEST['product_price'];
      $total_price= $_REQUEST['total_price'];
      $sql_product_item = "INSERT INTO order_details (user_id,product_id,product_name,product_price,quantity,total_price)
       VALUES('$last_id','$product_id','$product_name','$product_price','$product_quentity','$total_price')";
     $result_item =mysqli_query($conn,$sql_product_item);
     if($result_item){ ?>
      alert("Succesfully insert");
    <?php  }
     //  header('location:order_confirm.php');
      //  exit;
    }
}
// }


?>