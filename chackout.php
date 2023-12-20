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
    <!-- jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

    <script src="admin/assets//dist/js/form.validation.js"></script>

    <style>
        .error {
            color: red;
            font-weight: bold;
        }
       
    </style>
</head>

<body>
<?php include_once('./user_nav.php') ?>
    <div class="py-5">
        <div class="container mt-4" >
            <div class="card">
                <div class="card-body bg-light shadow">
                <form action="placeorder_process.php" method="POST" id="chackout_form">

                    <div class="row">

                        <div class="col-md-7 ">
                            <h5>Basic Details</h5>
                            <hr>
                            <!-- <form action="placeorder_process.php" method="POST" id="chackout_form"> -->
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="firstname"><i class="fa fa-user"></i> Full Name<strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="text" id="fname" name="firstname" placeholder="Enter your full name" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="email"><i class="fa fa-envelope"></i> Email <strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email Id" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="address"><i class="fa-solid fa-address-card"></i> Address <strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="text" id="adr" name="address" placeholder="Enter your Address" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="fw-bold" for="city"><i class="fa fa-institution"></i> City <strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="text" id="city" name="city" placeholder="Enter your City" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold" for="state"> <i class="fa-solid fa-globe"></i> State <strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="text" id="state" name="state" placeholder="Enter your State" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold" for="zip"><i class="fa-solid fa-location-pin"></i> Zip <strong class="text-danger">*</strong></label>
                                        <input class="form-control" type="text" id="zip" name="zip" placeholder="Enter your PIN code" >
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-primary flot-end col-md-12" name="placeorder" value="Place Order" class="btn">

                            <!-- </form> -->
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
                                        if (isset($value['total_price']) && $value['total_price'] >  0) {
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
                                                    <input  type="hidden" name="product_name" value="<?php echo $value['ProductName'] ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $key  ?>" >        

                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <input class="form-control bg-transparent text-center border-0" type="text" name="product_quentity" value="<?php echo $value['quentity'] ?>">
                                                    <input type="hidden" name="product_quentity" value="<?php echo $value['quentity'] ?>">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input class="form-control bg-transparent text-center border-0  " type="text" name="product_price" value="<?php echo "₹ " . $value["ProductPrice"]; ?>">
                                                    <input  type="hidden" name="product_price" value="<?php echo $value["ProductPrice"]; ?>">
                                                </div>

                                            </div>


                                        </div>

                                <?php }
                                } ?>
                        </div>
                        <strong class="m-3">Total <span class="float-end fw-bold "><i class="fa-solid fa-indian-rupee-sign"></i><?php echo " ". $sum . "/-" ?></span></strong>
                        <input type="hidden" name="total_price" value="<?php echo $sum  ?>" >        
                    </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>