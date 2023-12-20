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
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsive Checkout Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <!-- add bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- add bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- add font-aswome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      /* padding: 8px; */
    }

    * {
      box-sizing: border-box;
      
    }
    .hedar{
      font-family:Verdana, Geneva, Tahoma, sans-serif
      
    }
    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      flex: 75%;
    }

    .col-25,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      /* padding: 5px 20px 15px 20px; */
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
    .secound_con{
      margin-top: 20px;
    }
    
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
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
  </style>
</head>

<body>
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

      </div>
    </div>
  </nav>
  <h2 class="hedar">Checkout Form</h2>

  <div class="container">
    <form action="placeorder_process.php" method="POST">

      <h3>Billing Address</h3>
      <label for="fname"><i class="fa fa-user"></i> Full Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Enter your full name">

      <label for="email"><i class="fa fa-envelope"></i> Email</label>
      <input type="text" id="email" name="email" placeholder="Enter your email Id">

      <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
      <input type="text" id="adr" name="address" placeholder="Enter your Address">

      <label for="city"><i class="fa fa-institution"></i> City</label>
      <input type="text" id="city" name="city" placeholder="Enter your City">

      <div class="row">
        <div class="col-50">
          <label for="state">State</label>
          <input type="text" id="state" name="state" placeholder="Enter your State">
        </div>
        <div class="col-50">
          <label for="zip">Zip</label>
          <input type="text" id="zip" name="zip" placeholder="Enter your PIN code">
        </div>
      </div>
      <div class="container">
      <div class="secound_con">
        <h4>Cart
          <span class="price" style="color:black">
            <i class="fa fa-shopping-cart"></i>
            <sup><b><?php echo $q; ?></b></sup>
          </span>
        </h4>
        <hr>
        <?php
        $sum = 0;
        $values = $_SESSION['cart'];
        if (isset($_SESSION["cart"])) { ?>
          <table class="table table-bordered  text-center">
            <tr>
              <th> product Id</th>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Quentity</th>
              <th>Product Price</th>
            </tr>
            <?php foreach ($values as $key => $value) {
              $sum = $sum + $value['total_price'];
              $q = $q + $value['quentity'];
              $_SESSION['q'] = $q;
              if (isset($value['total_price']) && $value['total_price'] > 0) {
                $totalPrice = $value['total_price'];
              } else {
                $totalPrice = $value["ProductPrice"];
              } ?>
              <tr>
                <td><input class="form-control bg-transparent text-center border-0" type="text" name="product_id" value="<?php echo $key ?>"></td>
                <td><input class="form-control bg-transparent text-center border-0" type="text" name="product_name" value="<?php echo $value['ProductName'] ?>"></td>
                <td><img class="form-control bg-transparent text-center border-0" src='<?php echo $value['ProductImage']; ?>' width='50' height='50'></td>
                 <input type="hidden" value="<?php echo $value['ProductImage']; ?>" name="product_image" >
                <td><input class="form-control bg-transparent text-center border-0" type="text" name="product_quentity" value="<?php echo $value['quentity'] ?>"></td>
                <td><input class="form-control bg-transparent text-center border-0  " type="text" name="product_price" value="<?php echo $value["ProductPrice"]; ?>"></td>
                <input type="hidden" value="<?php echo $sum ?>" name="total_price" >
              </tr>
          <?php }
          } ?>
          </table>
          <p>Total <span class="price" style="color:black"><?php echo " " . $sum . "/-" ?></span></p>
        </div>
        </div>
      <input type="submit" name="placeorder" value="Place Order" class="btn">
    </form>
  </div>



</body>

</html>