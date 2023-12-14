<!DOCTYPE html>
<html lang="en">
<head>
 
  <!-- sweetalert cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

</html>
<?php
session_start();
if (isset($_REQUEST['addcart'])) {
  $product_name = $_REQUEST['product_name'];
  $product_price = $_REQUEST['product_price'];
  $product_image = $_REQUEST['product_image'];
  $product_quentity = $_REQUEST['product_quentity'];
  $total_item_price = ($product_quentity * $product_price);
  $_SESSION['cart'][] = ['ProductName' => $product_name, 'ProductPrice' => $product_price, 'total_price' => $total_item_price, 'ProductImage' => $product_image, 'quentity' => $product_quentity];
  echo '<script>
  swal("Good job!", "You clicked the button!", "success");
        
      </script>';
}
