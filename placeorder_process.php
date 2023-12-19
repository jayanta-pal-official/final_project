<?php
session_start();
include("admin/config/dbcon.php");
if($_SESSION['u_loggedin'] == true){
  if(isset($_REQUEST['placeorder'])){
    $firstname= $_REQUEST['firstname'];
    $email=$_REQUEST['email'];
    $address= $_REQUEST['address'];
    $city=$_REQUEST['city'];
    $state= $_REQUEST['state'];
    $zip =$_REQUEST['zip'];
  $sql= "UPDATE user SET address ='$address' ,city='$city', State='$state', pin='$zip' ";
    $result=mysqli_query($conn,$sql);
    if($result){
       header('location:order_confirm.php');
       exit;
    }
}
}else{
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
       header('location:order_confirm.php');
       exit;
    }
}
}


?>