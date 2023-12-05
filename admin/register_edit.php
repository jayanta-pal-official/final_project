<?php
session_start();
include("include/header.php");
include("include/sidebar.php");
include("include/topbar.php");
include("config/dbcon.php");

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Registered Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit - Register user</h3>
                            <a href="./registered.php" class="btn btn-danger btn-sm  float-right" >Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM `user` WHERE id=$id";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="./code.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="name" value="<?= $row['name']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $row['email']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone number" value="<?= $row['phone_number']  ?>">
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
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="update_user" value="Update">
                                                </div>
                                        </div>

                                        </form>
                                    </div>
                            <?php } else {
                                    echo "<h1 style='color:red' >" . "No data in table" . "</h1>";
                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include("include/footer.php");
?>