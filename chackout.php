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
    <title>Document</title>
    <!-- add bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- add bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- add font-aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid ">
            <img src="./upload/logo_champu.png" class="logo" alt="logo" style="width: 41px; height: auto; border-radius: 50%;">&nbsp;
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

            </div>
        </div>
    </nav>
    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body bg-light shadow">
                    <div class="row">
                        <div class="col-md-7 ">
                            <h5>Basic Details</h5>
                            <hr>
                            <form action="placeorder_process.php" method="POST">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="fname"><i class="fa fa-user"></i> Full Name</label>
                                        <input class="form-control" type="text" id="fname" name="firstname" placeholder="Enter your full name" required >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="email"><i class="fa fa-envelope"></i> Email</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email Id" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="adr"><i class="fa-solid fa-address-card"></i> Address</label>
                                        <input class="form-control" type="text" id="adr" name="address" placeholder="Enter your Address" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="city"><i class="fa fa-institution"></i> City</label>
                                        <input class="form-control" type="text" id="city" name="city" placeholder="Enter your City" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold" for="state"> <i class="fa-solid fa-globe"></i> State</label>
                                        <input class="form-control" type="text" id="state" name="state" placeholder="Enter your State" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold" for="zip"><i class="fa-solid fa-location-pin"></i> Zip</label>
                                        <input class="form-control" type="text" id="zip" name="zip" placeholder="Enter your PIN code" required>
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-primary flot-end col-md-12" name="placeorder" value="Place Order" class="btn">

                            </form>
                        </div>
                        <div class="col-md-5">
                            <h5>order details <span class="float-end" style="color:black">
                                    <i class="fa fa-shopping-cart"></i>
                                    <sup><b><?php echo $q; ?></b></sup>
                                </span></h5>
                            <hr>
                            <?php
                            $sum = 0;
                            $values = $_SESSION['cart'];
                            if (isset($_SESSION["cart"])) { ?>
                                <table class="table table-bordered  text-center">
                                 
                                    <?php foreach ($values as $key => $value) {
                                        $sum = $sum + $value['total_price'];
                                        $q = $q + $value['quentity'];
                                        $_SESSION['q'] = $q;
                                        if (isset($value['total_price']) && $value['total_price'] > 0) {
                                            $totalPrice = $value['total_price'];
                                        } else {
                                            $totalPrice = $value["ProductPrice"];
                                        } ?>
                                        <div class="mb-1 border">
                                            <div class="row align-items-center">
                                                <div class="col-md-2 align-items-center">
                                                    <img class="form-control bg-transparent text-center border-0" src='<?php echo $value['ProductImage']; ?>' width='50' height='50'>
                                                </div>
                                                <div class="col-md-5 text-center">
                                                    <input class="form-control bg-transparent text-center border-0" type="text" name="product_name" value="<?php echo $value['ProductName'] ?>">
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input class="form-control bg-transparent text-center border-0" type="text" name="product_quentity" value="<?php echo $value['quentity'] ?>">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input class="form-control bg-transparent text-center border-0  " type="text" name="product_price" value="<?php echo "₹ " . $value["ProductPrice"]; ?>">
                                                </div>

                                            </div>


                                        </div>

                                <?php }
                                } ?>
                        </div>
                        <strong class="m-3">Total <span class="float-end fw-bold "><?php echo "₹ " . $sum . "/-" ?></span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>