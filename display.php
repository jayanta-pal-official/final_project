<?php
session_start();
?>
<?php
if (empty($_SESSION["cart"])) {
    echo '<script>
            alert("Empty Card!!!")
            window.location = "index.php"
        </script>';
}
$values = $_SESSION['cart'];
echo '<table  class="table table-bordered text-center">';
echo '<tr><th> Index no</th>
        <th>Product Name</th>
         <th>Product Image</th> 
         <th>Product Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th>Update</th><th>Delete</th> </tr>';
$sum = 0;
$q = 0;
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

        // $from_one = $key + 1;
        echo
        "<tr>
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
                <td><input type='submit' name='remove' class='btn-danger ' value='Delete' onclick= 'return myfunction()' ></input></td> 
                <input type='hidden' name='remove_item' value='$value[ProductName]'>
                </form>
                </tr>
                ";
    }
    //    echo "<b>Total Price : ₹</b>" .$sum."/- <br>" ;
    //    echo"<b>  Total Quentity :</b>".$q; 
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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">
                            <h4>Home</h4>
                        </a>
                    </li>

                </ul>
                <form class="d-flex">
                    <!-- <a aria-current="page" href="./logout.php" name="removecart" style="text-decoration: none; color: black; font-size: 25px; "> Remove All <i style="color: red" class="fa-solid fa-trash"></i></a> -->
                    <a aria-current="page" style="text-decoration: none;  font-size: 30px; "> Cart<i class="fa-solid fa-cart-shopping"><sup style="font-size: 20px;"><?php echo " " . $q; ?></sup></i></a>

                </form>
            </div>
        </div>
    </nav>
    <div class="container" style="text-align: center; margin-top:40px ">

    </div>
    <div class="item_count text-center ">
        <?php


        echo "<b>Total Price : ₹</b>" . $sum . "/- <br>";
        echo "<b>  Total Quentity : </b>" . $q;
        ?>
    </div>
    <script>
        function myfunction() {
            return confirm("are you sure to delete item?")
        }
    </script>
</body>

</html>