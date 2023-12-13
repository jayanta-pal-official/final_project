<?php
session_start();
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        if ($key == $_REQUEST['delete_key']) {
            unset($_SESSION['cart'][$key]);
            echo "<script>
            alert('Item Removed');
            window.location = 'display.php';
            </script>";
        }
    }
}
