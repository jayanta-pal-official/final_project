<?php
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

        .shoping {
            font-size: 25px;
            font-weight: bold;
            color: black;
        }
        .result{
            margin-top: 30px;
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

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><b>TOTAL PRICE:</b> </a>
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
    <div class="container ">
        <div class="container-item">
            <table class="table table-bordered text-center result ">
                <tr>
                    <th> Index no</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
                <?php
                $sum = 0;
                $q = 0;
                if (empty($_SESSION["cart"])) {
                    echo '<script>
                        alert("Empty Card!!!")
                        window.location = "index.php"
                    </script>';
                }
                $values = $_SESSION['cart'];
                if (isset($_SESSION["cart"])) {
                    foreach ($values as $key => $value) {
                        $sum = $sum + $value['total_price'];
                        $q = $q + $value['quentity'];
                        $_SESSION['q'] = $q;
                        // echo '<pre>'; print_r($values);
                        if (isset($value['total_price']) && $value['total_price'] > 0) {
                            $totalPrice = $value['total_price'];
                        } else {
                            $totalPrice = $value["ProductPrice"];
                        }

                        echo "<tr>
                          <td>" . $key . "</td>
                            <td>  " . $value['ProductName'] . "</td>
                            <td><img src='" . $value['ProductImage'] . "' width='100' height='100'></td>
                            <td> " . $value['ProductPrice'] . "</td>
            
                            <form action='update.php' method='POST' >
                            <td> <input class='text-center border-0 ' name='quentity' type='number' min ='1' max='10'  value='$value[quentity]' ></td>
                            <td>" . $totalPrice . "</td>
                            <input type='hidden' name='key' value='$key'>
                            <input type='hidden' name='product_name' value='$value[ProductName]'>
                            <input type='hidden' name='product_image' value='$value[ProductImage]'>
                            <input type='hidden' name='update_item' value='$value[ProductName]'>
                            <input type='hidden' name='ProductPrice' value='$value[ProductPrice]'>
                            <td><input type='submit' class ='btn-warning' name='update' value='Update'></input></td>
                            </form>
                           
                            <form action='delete.php' method='POST' >
                            <input type='hidden' name='delete_key' value='$key'>
                            <td><input type='submit' name='remove' class='btn-danger ' value='Remove' onclick= 'return myfunction()' ></input></td> 
                            <input type='hidden' name='remove_item' value='$value[ProductName]'>
                            </form>
                            </tr>";
                    }
                }
                ?>
            </table>
            <div class="tota_price">
                <b> <label>Total Price : </label><strong style="color:aqua"><?php echo " " . $sum . "/-" ?></strong> </b>
                <button class="btn btn-info">Continue Shopping</button>
                <a  href="chackout.php" class="btn btn-dark">chackout</a>
            </div>
        </div>
    </div>
</body>

</html>