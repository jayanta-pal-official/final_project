<?php
//test
session_start();
include("admin/config/dbcon.php");
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
    <!-- add font-aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- add external css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- add font-aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweetalert cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            /* overflow-x: hidden; */
        }

        .banner {
            background-image: url(upload/banner.jpeg);
            /* background-size: cover; */
            background-repeat: no-repeat;
            background-size: 100% 50%;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .images {
            margin: 20px auto;
        }

        .logo {
            width: 41px;
            height: auto;
            border-radius: 50%;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .banner {
            width: 100%;
            height: 100vh;

        }

        .product {
            margin-top: 250px;
        }
        .shoping{
            font-size: 25px;
            font-weight: bold;
            color: black;
        }
        .card{
            background-color: whitesmoke;
        }
    </style>
</head>

<body>
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid ">
            <img src="./upload/logo_champu.png" class="logo" alt="logo">&nbsp;
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><b>HOME</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user_registration.php"><b>REGISTER</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact.php"><b>CONTACT</b></a>
                    </li>
                    
                   
                </ul>
                <form class="d-flex ">
                <a class="nav-link shoping" aria-current="page" href="display.php">cart <i class="fa-solid fa-cart-shopping"></i><sup><?php echo " " . $q; ?></sup></a>
                </form>
            </div>
        </div>
    </nav>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav  me-auto ">
            <li class="nav-item me-auto">
                <a href="" class="nav-link ">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a href="user_login.php" class="nav-link ">Login</a>
            </li>
        </ul>

    </nav>

    <div class="content-wrapper banner">
        <div class="row text-center products_bg">
            <!-- products -->
            <div class="col-md-11 images product">
                <div class="row">
                    <!-- <div class="col-md-4 mb-2"> -->
                    <?php
                    $select_query = "SELECT * FROM product";
                    $result = mysqli_query($conn, $select_query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="col-md-3 mb-2  ">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="card " style="width: 20rem;  ">
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
    </div>
<?php
if (isset($_REQUEST['addcart'])) {
    $product_name = $_REQUEST['product_name'];
    $product_price = $_REQUEST['product_price'];
    $product_image = $_REQUEST['product_image'];
    $product_quentity = $_REQUEST['product_quentity'];
    $total_item_price = ($product_quentity * $product_price);
    $_SESSION['cart'][] = ['ProductName' => $product_name, 'ProductPrice' => $product_price, 'total_price' => $total_item_price, 'ProductImage' => $product_image, 'quentity' => $product_quentity];
    echo '<script>
    swal("Added to cart!", "", "success");
          
        </script>';
  }
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>