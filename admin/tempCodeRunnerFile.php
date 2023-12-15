<?php
if (isset($_REQUEST['delete_btn_set'])) {
    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM product WHERE id=$id LIMIT 1";
    $delete_result = mysqli_query($conn, $delete_query);
}