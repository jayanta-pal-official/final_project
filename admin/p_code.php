<?php
session_start();
include("include/common.php");
include("common.fn.admin.php");

//INSERT PRODUCTS
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_product']) {
    $name = get_inputs('name');
    $descripiion = get_inputs('descripiion');
    $price = get_inputs('price');
    $image = $_FILES['image']['name'];
    insertProduct($conn,$name,$descripiion,$price,$image);
}
// EDIT PRODUCT
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_edit']) ) {
    $id = get_inputs('id');
    $edit_name = get_inputs('edit_name');
    $edit_description = get_inputs('edit_description');
    $edit_price = get_inputs('edit_price');
    $edit_image = $_FILES['edit_image']['name'];
    updateProduct($conn,$id,$edit_name,$edit_description,$edit_price,$edit_image);
}
// DELETE PRODUCT
// if ( isset($_REQUEST['delete']) ) {
   $id = $_GET['id'];
   
   $delete_query = "DELETE FROM product WHERE id=$id LIMIT 1";
   $delete_result =mysqli_query($conn,$delete_query);
   if($delete_result){
    $_SESSION['status'] = "Successfully delete product";
        echo "<script>window.location='product.php'</script>";
   }else{
    $_SESSION['status'] = "Can't delete product!";
    echo "<script>window.location='product.php'</script>";
   }
// }
    ?>    