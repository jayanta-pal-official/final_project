<?php
session_start();
// session_destroy();
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
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

        .item {
            background-color: whitesmoke;
        }

        .first_nav {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .secound_nav {
            width: 100%;
            position: fixed;
            z-index: 2;

        }
    </style>
</head>

<body>
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info first_nav">
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
   <nav class="navbar navbar-expand-lg navbar-dark bg-secondary secound_nav ">
        <ul class="navbar-nav  me-auto ">
            <li class="nav-item me-auto">
                <?php
                if(isset($_SESSION['u_loggedin'])){
                    $name =  $_SESSION['user_details']['user_name']; ?>
                    <a href="" class="nav-link ">Welcome <strong class="text-warning" ><?= strtok($name," ") ?></strong></a>
                <?php }
                else{ ?>
                    <a href="" class="nav-link ">Welcome Guest</a>
               <?php  }
                ?>
                
            </li>
            <li class="nav-item">
            <?php
                if(isset($_SESSION['u_loggedin'])){  ?>
                    <a href="user_logout.php" class="nav-link "><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
               <?php  } 
                else{ ?>
                    <a href="user_login.php" class="nav-link ">Login</a><i class="fa-solid fa-right-from-bracket"></i>
               <?php }?>
                
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
                        $i=1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="col-md-3 mb-2 d-flex aligns-items-center justify-content-center ">
                                <div class="card item" style="width: 20rem;  ">
                                    <img src="<?php echo "upload/".$row['image'] ?>" alt="image" class="card-img-top" alt="IMG">
                                    <div class="card-body ">
                                        <h5 class="card-title"><?= $row['name'] ?></h5>
                                        <span><?= $row['description'] ?></span>
                                        <p class="card-text">₹ <?= $row['price'] ?></p>
                                        <form action="" method="POST">
                                        <input type="number" class="text-center border" name="product_quentity" id="product_quentity<?=$i?>" value="1" min="1" max="10">
                                        <input type="hidden" name="id"  id="id<?= $i?>" value="<?php echo $row['id']; ?>" >
                                        <input type="hidden" name="product_name" id="product_name<?= $i?>" value="<?= $row['name']; ?>">
                                        <input type="hidden" name="product_price" id="product_price<?= $i?>" value="<?= $row['price']; ?>">
                                        <input type="hidden" name="product_image" id="product_image<?= $i?>" value="<?php echo "upload/" . $row['image']; ?>">
                                        <button type="button" name="addcart" class="addcart btn btn-info" id="submit"  onclick="myfunction()" >Add Cart </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $i++;    
                    }
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function(){
        $(".addcart").click(function myfunction(e) {
            e.preventDefault();
            var index= $(".addcart").index($(this));
            var numIndex =Number(index)+1;
            // alert(numIndex)
            var id = $("#id").val();
            var product_quentity = $("#product_quentity"+numIndex).val();
            // alert(product_quentity)
            var product_image = $("#product_image"+numIndex).val();
            var product_price = $("#product_price"+numIndex).val();
            // alert(product_price)
            var product_name = $("#product_name"+numIndex).val();
            var total_item_price = (product_quentity * product_price);
            // alert(total_item_price)
      
            $.ajax({
                url: "process.php",
                type: "POST",
                data: {
                    id:id,
                    product_name: product_name,
                    product_price: product_price,
                    product_quentity: product_quentity,
                    product_image: product_image,
                    total_item_price: total_item_price,
                },
                success: function(data) {
                        swal("Added to cart!", "Item has been added to your cart", "success")
                            .then((result) => {
                                location.reload();
                            })
                            .then( $("#submit").click(function myfunction() {
                            }))
                },
                error: function(xhr, status, error) {
                    swal("not added!", "Failed to add item to cart", "error")
                            .then((result) => {
                                location.reload();
                            });
                },
            });
        })
    })

</script>
<script>
    // $(document).ready(function() {
    //     $("#submit").on("click", function(e) {
    //         e.preventDefault();
    //         var product_quentity = $("#product_quentity").val();
    //         var product_image = $("#product_image").val();
    //         var product_price = $("#product_price").val();
    //         var product_name = $("#product_name").val();
    //         var total_item_price = (product_quentity * product_price);
    //         $.ajax({
    //             url: "process.php",
    //             type: "POST",
    //             data: {
    //                 product_name: product_name,
    //                 product_price: product_price,
    //                 product_quentity: product_quentity,
    //                 product_image: product_image,
    //                 total_item_price: total_item_price,
    //             },
    //             success: function(data) {
    //                     swal("Added to cart!", "Item has been added to your cart", "success")
    //                         .then((result) => {
    //                             location.reload();
    //                         });
    //             },
    //             error: function(xhr, status, error) {
    //                 swal("not added!", "Failed to add item to cart", "error")
    //                         .then((result) => {
    //                             location.reload();
    //                         });
    //             },
    //         });
    //     });
    // });
</script>

</html>