<?php
session_start();
include("include/common.php");
?>

<div class="content-wrapper">
    <?php
      $id = $_GET['id'];
      $delete_query= "DELETE FROM `user` WHERE id=$id";
      $delete_result= mysqli_query($conn,$delete_query);
      if($delete_query){
        $_SESSION['status']="User deleted successfully";
        echo"<script>window.location='registered.php'</script>";
      }
      else{
        $_SESSION['status']="User can't deleted ";
        echo"<script>window.location='registered.php'</script>";

      }
    
    ?>
</div>


<?php
include("include/footer.php");
?>