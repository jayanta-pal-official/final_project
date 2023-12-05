<?php
session_start();
if (isset($_REQUEST['update'])) {
    $product_name = $_REQUEST['product_name'];
    $product_image = $_REQUEST['product_image'];
    $product_price = $_REQUEST['ProductPrice'];
    $product_quentity = $_REQUEST['quentity'];
    $total_item_price = $_REQUEST['ProductPrice'] * $_REQUEST['quentity'];
    $_SESSION['cart'][$_REQUEST['key']] = ['ProductName' => $product_name, 'ProductImage' => $product_image, 'ProductPrice' => $product_price, 'total_price' => $total_item_price, 'quentity' => $product_quentity];
}
echo "<script>
alert('Item Updated');
window.location = 'display.php';
</script>";
