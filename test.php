<?php
session_start();
// session_destroy();
if(isset($_SESSION['order'])){
    echo "<pre>";
    print_r($_SESSION['order']);
}

// $last_id = $conn->insert_id;

?>