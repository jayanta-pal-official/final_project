<?php
session_start();
include("include/header.php");
include("include/sidebar.php");
include("include/topbar.php");
include("config/dbcon.php");
?>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
          <form action="./p_code.php" method="POST" id="form" enctype="multipart/form-data">
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
          <?php if (isset($_SESSION['status'])) {
            echo "<h4>" . $_SESSION['status'] . "</h4>";
            session_unset();
          }
          ?>

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
                if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><img src="<?php echo "../upload/".$row['image'] ?>" alt="image" class="card-img-top" width="100px" height="70px" alt="..."></td>
                    <td>
                      <a href="product_edit.php?id=<?php echo $row['id'] ?>" name="edit" class="btn btn-primary btn-sm">EDIT</a>
                      <a href="p_code.php?id=<?php echo $row['id'] ?>" name="update" class="btn btn-warning btn-sm"> UPDATE</a>
                      <a href="p_code.php?id=<?php echo $row['id'] ?>" name="delete"  onclick="return my_function()"  class="btn btn-danger btn-sm">DELETE</a>
                    </td>
                  </tr>
                  <?php
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

<script>
   function my_function() {
    return confirm("are you sure ?");
  }
</script>
<?php
include("include/footer.php");
?>