<?php
session_start();
$id= $_POST['delete_id'];
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        if ($key == $id) {
            unset($_SESSION['cart'][$key]);
            echo "<script>
            alert('Item Removed');
            window.location = 'display.php';
            </script>";
        }
    }
}

