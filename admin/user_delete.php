<?php
session_start();
include("include/common.php");
?>

<div class="content-wrapper">
  <?php
  $id = $_GET['id'];
  $delete_query = "DELETE FROM `user` WHERE id=$id";
  $delete_result = mysqli_query($conn, $delete_query);
  if ($delete_result) {
    $_SESSION['status'] = "User deleted successfully";
 echo "<script>
 window.location='registered.php'
 </script>";
    // header("location: registered.php");
    // exit;
  } else {
    $_SESSION['status'] = "User can't deleted ";
    header("location: registered.php");
    exit;
  }

  ?>
</div>


<?php
include("include/footer.php");
?>