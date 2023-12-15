<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />

</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center wrapper" id="login-box">
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
                       <div class="btn_flex">
                        <a href="./user_login.php" class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</a>
                        <a href="index.php" class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Back</a>
    
                    </div>
                    </div>
                    <div class="col-lg-7 bg-white p-4">
                        <h1 class="text-center font-weight-bold text-primary">USER REGISTER PANEL</h1>
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

        <style>
            @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Maven Pro", sans-serif;
            }
            .btn_flex{
                display: flex;
                gap: 10px;
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
</body>

</html>