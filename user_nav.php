<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .banner {
        background-image: url(upload/banner.jpeg);
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
        width: 4%;
        height: 3%;
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

    .banner {
        background-image: url(upload/banner.jpeg);
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
        font-size: 19px;
        font-weight: bold;
        color: whitesmoke;
    }
    .shoping:hover{
        color: white;
    }

    .result {
        margin-top: 30px;
    }
    .quantity{
            position: absolute;
    top: 7px;
    text-align: center;
    border-radius: 7px;
    width: 22px;
    height: 18px;
    background-color: #ff6161;
    border: 1px solid #fff;
    font-weight: 700;
    color: #f0f0f0;
    line-height: 16px;
    font-size: 12px;
            
        }
</style>
<?php
$q = 0;
if (isset($_SESSION["cart"])) {
  foreach ($_SESSION["cart"] as $key => $value) {
    $q = $q + $value['quentity'];
    $_SESSION['q'] = $q;
  }
}
?>
<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #478dff;" >
    <div class="container-fluid ">
        <img src="./upload/logo_champu.png" class="logo" alt="logo">&nbsp;
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="index.php"><b>HOME</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="contact.php"><b>CONTACT</b></a>
                </li>
            </ul>
            <form class="d-flex ">
                <a class="nav-link shoping" aria-current="page" href="display.php">Cart <i class="fa-solid fa-cart-shopping"></i><sup class="quantity" ><?php echo $q; ?></sup></a>
            </form>
        </div>
    </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark" style=" background-color: #2a3a4de0; ">
    <ul class="navbar-nav  me-auto ">
        <li class="nav-item me-auto">
            <?php
            if (isset($_SESSION['u_loggedin'])) {
                $name =  $_SESSION['user_details']['user_name']; ?>
                <a href="" class="nav-link ">Welcome <strong class="text-warning"><?= strtok($name, " ") ?></strong></a>
            <?php } else { ?>
                <a href="" class="nav-link ">Welcome Guest</a>
            <?php  }
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (isset($_SESSION['u_loggedin'])) {  ?>
                <a href="user_logout.php" class="nav-link ">Logout <i class="fas fa-sign-out-alt"></i></a>
            <?php  } else { ?>
                <a href="user_login.php" class="nav-link "><i class="fas fa-sign-in-alt"></i>&nbsp<b>Login </b> </a>
            <?php } ?>

        </li>
    </ul>
</nav>