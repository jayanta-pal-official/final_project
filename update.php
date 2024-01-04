<?php
session_start();

$product_name = $_POST['product_names'];
 $product_image = $_POST['product_image'];
 $product_price = $_POST['product_price'];
 $product_quentity = $_POST['product_quentity'];
 $total_item_price = $_POST['total_item_price'];
 $_SESSION['cart'][$_POST['id']] = ['ProductName' => $product_name,'ProductPrice' => $product_price,'total_price' => $total_item_price,'ProductImage' => $product_image, 'quentity' => $product_quentity];

?>
