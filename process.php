<?php
session_start();
if(isset($_REQUEST['addcart'])) {
      $product_name = $_REQUEST['product_name'];
      $product_price = $_REQUEST['product_price'];
      $product_image = $_REQUEST['product_image'];
      $product_quentity= $_REQUEST['product_quentity'];
       $total_item_price =($product_quentity * $product_price) ;
      $_SESSION['cart'][] = ['ProductName' => $product_name, 'ProductPrice' => $product_price,'total_price'=>$total_item_price, 'ProductImage' => $product_image, 'quentity' => $product_quentity];
      echo'<script>
        alert("Added to cart")
        window.location = "index.php"
      </script>';
  
}
?>