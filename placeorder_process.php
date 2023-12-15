<?php
include("admin/config/dbcon.php");

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
        echo"<script>alert('save')</script>";
    }

}
?>