<?php
session_start();
require_once('assets/constants/config.php');
require_once('assets/constants/fetch-my-info.php');

?>
<?php

$sql = "SELECT * FROM manage_website where status='0'";


$statement = $conn->prepare($sql);
$statement->execute();


$row = $statement->fetch(PDO::FETCH_ASSOC);
extract($row); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>


<body style="background-image: url('assets/uploadImage/Logo/<?php echo $background_login_image; ?>');" style="  background-repeat: no-repeat;
  background-size: auto;">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.php"><img class="img-fluid" src="assets/uploadImage/Logo/<?php echo $logo; ?>" style="width:300px;height:auto;" alt="Theme-Logo" width="50%" />
                </a><!--<span class="splash-description" width="50%">Admin Login.</span>--></div>
            <div class="card-body">
                <?php require_once('assets/constants/check-reply.php'); ?>

                <form action="assets/app/auth.php" method="POST" autocomplete="OFF">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField1" type="text" placeholder="Email" autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField2" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button> <br>

                    <!-- <a href="login.php" class="footer-link">Voter Login</a>-->
                </form>
            </div>
            <!-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="voter_registration.php" class="footer-link">Register Voter</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="forgot_password.php" class="footer-link">Forgot Password</a>
                </div>
            </div>-->
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    
    <script src="admin/assets/js/space.js"></script>
</body>

</html>