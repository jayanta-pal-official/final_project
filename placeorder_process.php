<?php
session_start();
include("admin/config/dbcon.php");

if(isset($_REQUEST['placeorder'])){
    $firstname= $_REQUEST['firstname'];
    $email=$_REQUEST['email'];
    $address= $_REQUEST['address'];
    $city=$_REQUEST['city'];
    $state= $_REQUEST['state'];
    $zip =$_REQUEST['zip'];
    

  $sql= "INSERT INTO order_details (name,email,address,city,State,pin) VALUES('$firstname', '$email','$address','$city','$state','$zip')";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "<script>alert('done')</script>";
       header('location:order_confirm.php');
       exit;
    }

}
if(isset($_REQUEST['placeorder'])){
   
        $product_id= $_REQUEST['product_id'];
        $product_name = $_REQUEST['product_name'];
        $product_image= $_REQUEST['product_image'];
        $product_quentity = $_REQUEST['product_quentity'];
        $product_price = $_REQUEST['product_price'];
        $total_price= $_REQUEST['total_price'];
        $_SESSION['order'][]=['product_id'=>$product_id, 'product_image'=>$product_image, 'product_quentity'=> $product_quentity, 'product_price'=>$product_price];

    
}
?>