<?php
error_reporting(0);
//inputs validation
function get_inputs($index)
{
    $inputs = isset($_POST[$index]) ? $_POST[$index] : "";
    return $inputs;
}
//Insert User
function insertFunction($conn, $name, $email, $phone_number, $password, $confirm_password){
    if($password == $confirm_password){
      $check_email="SELECT email FROM user WHERE email='$email' "; 
      $check_result = mysqli_query($conn,$check_email);
     if(mysqli_num_rows($check_result)>0){
      $_SESSION['status'] = "Email Id allready exisest!";
      header("location: registered.php");
      exit;
     }else{
      $sql = "INSERT INTO user (name,email,phone_number,password,user_role) VALUES ('$name','$email','$phone_number','$password','user')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
         $_SESSION['status'] = "successfully submitted";
         header("location: registered.php");
         exit;
      } else {
         $_SESSION['status'] = "data not submitted";
         header("location: registered.php");
         exit;
      }
     }
   } else {
      $_SESSION['status'] = "password and confirm password are different!";
      header("location: admin/registered.php");
      exit;
   }
}

// Update User
function updateFunction($conn, $id, $update_name, $update_email, $update_phone_number, $update_user_role){
    $update_query = " UPDATE user SET name='$update_name', email='$update_email', phone_number='$update_phone_number',user_role=$update_user_role WHERE id=$id";
   $update_result = mysqli_query($conn, $update_query);
   if ($update_query) {
      $_SESSION['status'] = "User updatated successfully";
      header("location: registered.php");
   } else {
      $_SESSION['status'] = "User not updatated";
      header("location: registered.php");
      exit;
   }
}
//Delete User
function logoutFunction(){
    unset($_SESSION['loggedin']);
    unset($_SESSION['log_user']);
    $_SESSION['status'] ="Logged out successfully";
    header('location:login.php');
    exit;
}
///Insert product 
function insertProduct($conn,$name,$descripiion,$price,$image){
    $sql = "INSERT INTO product (name,description,price,image) VALUES ('$name','$descripiion','$price','$image')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']);
        $_SESSION['status'] = "product successfully submitted";
        echo "<script>window.location='product.php'</script>";
        exit;
    } else {
        $_SESSION['status'] = "product not submitted";
        echo "<script>window.location='product.php'</script>";
        exit;
    }
}
// update product
function updateProduct($conn,$id,$edit_name,$edit_description,$edit_price,$edit_image){
    $edit_sql = "UPDATE product SET name='$edit_name', description= '$edit_description', price='$edit_price', image = '$edit_image' WHERE id=$id";
    $result = mysqli_query($conn, $edit_sql);
    if ($result) {
        move_uploaded_file($_FILES['edit_image']['tmp_name'], "../upload/".$_FILES['edit_image']['name']);
        $_SESSION['status'] = "product editted";
        echo "<script>window.location='product.php'</script>";
        exit;
    } else {
        $_SESSION['status'] = "product not editted";
         echo "<script>window.location='product.php'</script>";
         exit;
    }
}

?>