<?php
// session_start();
include("admin/config/dbcon.php");
include("./user_authentication.php");

$q = 0;
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        $q = $q + $value['quentity'];
        $_SESSION['q'] = $q;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website</title>
    <!-- add bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- add bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- add font-aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .images {
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['user_status'])) { ?>
        <div class="alert alert-success alert-dismissible fade show text-center " role="alert">
            <?php echo "<b> Hey! </b>" . $_SESSION['user_status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['user_status']);
    }
    ?>

    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">
                            <h4>Home</h4>
                        </a>
                        <a href="./user_logout.php">log out</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a aria-current="page" href="./display.php" style="text-decoration: none;  font-size: 30px; "> Cart<i class="fa-solid fa-cart-shopping"><sup><?php echo " " . $q; ?></sup></i></a>
                </form>
            </div>
        </div>
    </nav>

    <div class="row text-center">
        <!-- products -->
        <div class="col-md-10 images">
            <div class="row">
                <!-- <div class="col-md-4 mb-2"> -->
                <?php
                $select_query = "SELECT * FROM product";
                $result = mysqli_query($conn, $select_query);
                // $row= mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-md-4 mb-2">
                            <form method="POST" action="process.php">
                                <div class="card" style="width: 25rem;">
                                    <img src="<?php echo "upload/" . $row['image'] ?>" alt="image" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['name'] ?></h5>
                                        <span><?= $row['description'] ?></span>
                                        <p class="card-text">₹ <?= $row['price'] ?></p>
                                        <input type="number" class="text-center border" name="product_quentity" value="1" min="1" max="10">
                                        <input type="hidden" name="product_image" value="./images/food1.jpg">
                                        <input type="hidden" name="product_name" value="<?= $row['name'] ?>">
                                        <input type="hidden" name="product_price" value="<?= $row['price'] ?>">
                                        <input type="hidden" name="product_image" value="<?php echo "upload/" . $row['image'] ?>">
                                        <input type="submit" name="addcart" value="Add Cart" class="btn btn-info"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php }
                } else { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center " role="alert">
                        <strong>Warning!</strong> No record found
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php  }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>