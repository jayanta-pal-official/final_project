<?php
session_start();
if(isset($_SESSION['order'])){
    echo "<pre>";
    print_r($_SESSION['order']);
}
?>