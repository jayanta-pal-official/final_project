<?php
session_start();
include("config/dbcon.php");
include("include/header.php");
include("include/sidebar.php");
include("include/topbar.php");

//INSERT PRODUCTS
if (isset($_REQUEST['add_product'])) {
    $name = $_REQUEST['name'];
    $descripiion = $_REQUEST['descripiion'];
    $price = $_REQUEST['price'];
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO product (name,description,price,image) VALUES ('$name','$descripiion','$price','$image')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $_FILES['image']['name']);
        $_SESSION['status'] = "product successfully submitted";
        echo "<script>window.location='product.php'</script>";
    } else {
        $_SESSION['status'] = "product not submitted";
        echo "<script>window.location='product.php'</script>";
    }
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