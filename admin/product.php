<?php
// session_start();
include("./authentication.php");
include("include/common.php");
?>
<!-- Bootstrap 4 CSS CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
<!-- Bootstrap 4 js CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- sweetalert cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="content-wrapper">
  <!-- Modal -->
  <div class="modal fade" id="Add_user_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="p_code.php" method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <label>Descripiion</label>
              <input type="text" name="descripiion" id="descripiion" class="form-control" placeholder="Descripiion">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" id="price" class="form-control" placeholder="Price">
            </div>
            <div class="row ">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" id="image" class="form-control" placeholder="Image">
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="add_product" value="submit">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> Produts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($_SESSION['status'])) { ?>
            <div class="alert alert-info alert-dismissible fade show text-center " role="alert">
              <?php echo "<b> Hey! </b>" . $_SESSION['status']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php unset($_SESSION['status']);
          } ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product List</h3>
              <a href="#" class="btn btn-primary btn-sm  float-right" data-toggle="modal" data-target="#Add_user_model">Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>SL NO</th>
                    <th> NAME</th>
                    <th> DESCRIPTION</th>
                    <th> PRICE</th>
                    <th> IMAGE</th>
                    <th> ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $select_query = "SELECT * FROM product";
                  $result = mysqli_query($conn, $select_query);
                  $number = 1;
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?= $number ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><img src="<?php echo "../upload/" . $row['image'] ?>" alt="image" class="card-img-top" width="50px" height="50px" alt="..."></td>
                        <td>
                          <a href="product_edit.php?id=<?php echo $row['id'] ?>" name="edit" class="btn btn-primary btn-sm">EDIT</a>
                          <a href="p_code.php?id=<?php echo $row['id'] ?>" name="delete" onclick="return my_function()" class="btn btn-danger btn-sm">DELETE</a>
                          <!-- <form action="p_code.php" onclick="return my_function(this)" >
                            <input type="hidden" value="<?php //echo $row['id'] ?>">
                          <input type="submit"  name="delete" class="btn btn-danger btn-sm" value="delete">

                          </form> -->
                        </td>
                      </tr>
                  <?php
                      $number++;
                    }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
   function my_function() {
    return confirm("are you sure ?");
  }
</script>
<script>
  // window.addEventListener('load', function() {
    
  // })
//   function my_function(form){
//     swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     form.submit();
//   } 
// });
// return false;
//   }
</script>
<?php
include("include/footer.php");
?>