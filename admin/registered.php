<?php
include("./authentication.php");
include("include/common.php");
?>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="content-wrapper">
  <!-- Modal -->
  <div class="modal fade" id="Add_user_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./code.php" method="POST" id="form">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Phone number</label>
              <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone number">
            </div>
            <div class="row ">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
              </div>

            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="add_user" value="submit">
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
            <li class="breadcrumb-item active"> Registered Users</li>
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
            
          }
          unset($_SESSION['status']);
          ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <a href="#" class="btn btn-primary btn-sm  float-right" data-toggle="modal" data-target="#Add_user_model">Add user</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>SL NO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NUMBER</th>
                    <th>ROLE</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `user`";
                  $result = mysqli_query($conn, $sql);
                  // $red= mysqli_fetch_assoc($result);
                  foreach ($result as $row) { ?>
                    <tr>
                      <td><?= $row['id'] ?></td>
                      <td><?= $row['name'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['phone_number'] ?></td>
                      <td><?php
                        if($row['user_role'] == "1"){
                          echo "Admin";
                        }elseif($row['user_role'] == "0"){
                          echo "user";
                        }else{
                          echo "Invalid user";
                        }
                        ?>
                      </td>
                      <td><a href="register_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                        <a href="user_delete.php?id=<?php echo $row['id'] ?>" onclick="return my_function()" class="btn btn-danger btn-sm">DELETE</a>
                        <?php if($row['user_role'] == "0"){ ?>
                        <a href="order.php?id=<?php echo $row['id'] ?>"  class="btn btn-success btn-sm">VIEW PRODUCT <i class="fa-regular fa-eye"></i></a>
                        <?php } ?>
                      </td>
                    </tr>

                  <?php }
                  ?>
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
  $(document).ready(function() {
    $('#name, #email,#phone_number,#password,#confirm_password').focus(function() {
      $(this).css('background-color', 'rgba(80, 199, 56)');
    });
    $('#name,#email,#phone_number,#password,#confirm_password').blur(function() {
      $(this).css('background-color', '');
    });
  });
</script>

<?php
include("./include/footer.php");
?>