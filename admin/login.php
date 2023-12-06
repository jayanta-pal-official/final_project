<?php
session_start();
include("./config/dbcon.php");

if (isset($_SESSION['loggedin'])) {
    $_SESSION['status'] = "You are all ready logged In ";
    header("location: index.php");
    exit();
}
if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $query = "SELECT * FROM `user` WHERE 	user_role = 'admin' AND email = '$email' AND password='$password' ";
    $result = mysqli_query($conn, $query);
    

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['log_user'] = [
            'admin_name' => $row['name']
        ];

        header("location: index.php");
    } else {
        $_SESSION['status'] = "Email and Password not matched ";
        // echo"<script>window.location='login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Login, Registration & Forgot Form Design</title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Bootstrap 4 js CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="bg-info">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Maven Pro", sans-serif;
        }

        .wrapper {
            height: 100vh;
        }

        .myColor {
            background-image: linear-gradient(to right, #f83600 50%, #f9d423 150%);
        }

        .myShadow {
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.5);
        }

        .myBtn {
            border-radius: 50px;
            font-weight: bold;
            font-size: 20px;
            background-image: linear-gradient(to right, #0acffe 0%, #495aff 100%);
            border: none;
        }

        .myBtn:hover {
            background-image: linear-gradient(to right, #495aff 0%, #0acffe 100%);
        }

        .myHr {
            height: 2px;
            border-radius: 100px;
        }

        .myLinkBtn {
            border-radius: 100px;
            width: 50%;
            border: 2px solid #fff;
        }

        @media (max-width: 720px) {
            .wrapper {
                margin: 2px;
            }
        }
    </style>
    <div class="container">
        <!-- Login Form Start -->
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto myShadow">
                <?php if (isset($_SESSION['auth_status'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center " role="alert">
                        <?php echo "<b> Warning ! </b>" . $_SESSION['auth_status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['auth_status']);
                }
                ?>

                <div class="row">
                    <div class="col-lg-7 bg-white p-4">

                        <h1 class="text-center font-weight-bold text-primary">ADMIN LOGIN PANEL</h1>
                        <hr class="my-3" />
                        <form action="" method="post" class="px-3" id="login-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                                </div>
                                <input type="email" id="admin_name" name="email" class="form-control rounded-0" placeholder="Email" required />
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                                </div>
                                <input type="password" id="password" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required autocomplete="off" />
                            </div>
                            <div class="form-group clearfix">
                                <div class="custom-control custom-checkbox float-left">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="rem" />
                                    <label class="custom-control-label" for="customCheck">Remember me</label>
                                </div>
                                <div class="forgot float-right">
                                    <a href="#" id="forgot-link">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="login-btn" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" />
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                        <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
                        <hr class="my-3 bg-light myHr" />
                        <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Form End -->

        <!-- Forgot Password Form Start -->
        <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
            <div class="col-lg-10 my-auto myShadow">
                <div class="row">
                    <div class="col-lg-7 bg-white p-4">
                        <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
                        <hr class="my-3" />
                        <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
                        <form action="#" method="post" class="px-3" id="forgot-form">
                            <div id="forgotAlert"></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                                </div>
                                <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                        <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
                        <hr class="my-4 bg-light myHr" />
                        <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forgot Password Form End -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>