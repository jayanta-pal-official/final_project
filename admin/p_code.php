<?php
session_start();
include("include/common.php");
include("common.fn.admin.php");

//INSERT PRODUCTS
if (isset($_REQUEST['add_product'])) {
    $name = $_REQUEST['name'];
    $descripiion = $_REQUEST['descripiion'];
    $price = $_REQUEST['price'];
    $image = $_FILES['image']['name'];
    insertProduct($conn,$name,$descripiion,$price,$image);    
}
// EDIT PRODUCT
if (isset($_REQUEST['product_edit'])) {
    $id = $_REQUEST['id'];
    
    $edit_name = $_REQUEST['edit_name'];
    $edit_description = $_REQUEST['edit_description'];
    $edit_price = $_REQUEST['edit_price'];
    $edit_image = $_FILES['edit_image']['name'];

    $edit_sql = "UPDATE product SET name='$edit_name', description='$edit_description', price='$edit_price', image = '$edit_image' WHERE id=$id; ";
    $result = mysqli_query($conn, $edit_sql);
    if ($result) {
        move_uploaded_file($_FILES['edit_image']['tmp_name'], "upload/" . $_FILES['edit_image']['name']);
        $_SESSION['status'] = "product editted";
        echo "<script>window.location='product.php'</script>";
    } else {
        $_SESSION['status'] = "product not editted";
        echo "<script>window.location='product.php'</script>";
    }
}
// DELETE PRODUCT

   $id=$_GET['id'];
   $delete_query = " DELETE FROM product WHERE id=$id ";
   $delete_result =mysqli_query($conn,$delete_query);
   if($delete_query){
    $_SESSION['status'] = "Successfully delete product";
        echo "<script>window.location='product.php'</script>";
   }else{
    $_SESSION['status'] = "Can't delete product!";
    echo "<script>window.location='product.php'</script>";
   }
    ?>    