<?php
session_start();
include("include/common.php");
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
                        <li class="breadcrumb-item active">Edit - Product</li>
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
                            <h3 class="card-title">Edit - Product</h3>
                            <a href="./product.php" class="btn btn-danger btn-sm  float-right"  >Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM `product` WHERE id=$id";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="./p_code.php" method="POST" enctype="multipart/form-data" >
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="edit_name" class="form-control" placeholder="name" value="<?= $row['name']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description </label>
                                                    <input type="text" name="edit_description" class="form-control" placeholder="Email" value="<?= $row['description']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="edit_price" class="form-control" placeholder="Phone number" value="<?= $row['price']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="edit_image" id="image" class="form-control" placeholder="Image">
                                                </div>
                                                <input type="hidden"  name="id" value="<?php echo $_GET['id'] ?>">
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="product_edit" value="Update">
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