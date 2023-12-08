<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Login, Registration & Forgot Form Design</title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="bg-info">
    <div class="container">
        <!-- Login Form Start -->
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto myShadow">
                <div class="row">
                    <div class="col-lg-7 bg-white p-4">
                        <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
                        <hr class="my-3" />
                        <form action="./user_code.php" method="post" class="px-3" id="login-form">
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
                        <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
                        <hr class="my-3 bg-light myHr" />
                        <p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Form End -->
        <!-- Registration Form Start -->
        <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <?php if (isset($_SESSION['user_status'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center " role="alert">
                        <?php echo "<b> Hey! </b>" . $_SESSION['user_status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['user_status']);
                }
                ?>
            <div class="col-lg-10 my-auto myShadow">
                <div class="row">
                    <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                        <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
                        <hr class="my-4 bg-light myHr" />
                        <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
                        <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
                    </div>
                    <div class="col-lg-7 bg-white p-4">
                        <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
                        <hr class="my-3" />
                        <form action="./user_code.php" method="post" class="px-3" id="register-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone number">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <input type="submit" name="add_user" id="register-btn" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registration Form End -->
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

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(function() {
            $("#register-link").click(function() {
                $("#login-box").hide();
                $("#register-box").show();
            });
            $("#login-link").click(function() {
                $("#login-box").show();
                $("#register-box").hide();
            });
            $("#forgot-link").click(function() {
                $("#login-box").hide();
                $("#forgot-box").show();
            });
            $("#back-link").click(function() {
                $("#login-box").show();
                $("#forgot-box").hide();
            });
        });
    </script>
</body>

</html>