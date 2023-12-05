<?php
session_start();

if(isset($_REQUEST['addcart'])) {

  // if(empty($_SESSION['cart'])) {
  //   $myitems = array_column($_SESSION['cart'], 'ProductName');
  //   if (in_array($_REQUEST['product_name'], $myitems)) {

  //     echo '<script>
  //     alert("Item allready Added")
  //     window.location= "index.php"
  //     </script>';
  //   }
  //    else {  
  
      $product_name = $_REQUEST['product_name'];
      $product_price = $_REQUEST['product_price'];
     
      $product_image = $_REQUEST['product_image'];
      $product_quentity= $_REQUEST['product_quentity'];
      
       $total_item_price =($product_quentity * $product_price) ;
      $_SESSION['cart'][] = ['ProductName' => $product_name, 'ProductPrice' => $product_price,'total_price'=>$total_item_price, 'ProductImage' => $product_image, 'quentity' => $product_quentity];
      // echo "<pre>";
      // print_r($_SESSION["cart"]);

      echo'<script>
        alert("Added to cart")
        window.location = "index.php"
      </script>';
  //   }
    
  // }
}
?>