<?php
require_once('../includes/connection/conn.php');
    $username = "";
    $password = "";
    require_once('../includes/function/function.php');
    $login_user = login_user($username, $password);


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
<body>
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a href="../index.php"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            <form id="login" action"login.php"  method="post">
                <div class="form-group">
                    <input class="form-control form-control-lg"  name="username" type="text" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username']; } ?>" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg"  name="password" type="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>" placeholder="Password">
                </div>
                <div class="form-group">
                        <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])){ ?> Checked <?php } ?>"><span class="custom-control-label">Remember Me</span>
                        </label>
                </div>
                <input type="submit" name="login" value="login" class="btn btn-lg btn-success btn-block">
                <!-- <button type="submit" value="login" class="btn btn-primary btn-lg btn-block">Sign in</button> -->
            </form>
        </div>
<!--        <div class="card-footer bg-white p-0  ">-->
<!--            <div class="card-footer-item card-footer-item-bordered">-->
<!--                <a href="#" class="footer-link">Create An Account</a></div>-->
<!--            <div class="card-footer-item card-footer-item-bordered">-->
<!--                <a href="#" class="footer-link">Forgot Password</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 </html>