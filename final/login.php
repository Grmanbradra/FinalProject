<?php
    require_once __DIR__ . '/autoload.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['name'] != '') {
        if($_SESSION['user']['permission'] == 1) {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="vendor/vali-admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manage Categories System Automatically with Web API</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Manage Categories System Automatically with Web API</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="login/check_login.php" method="post">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Username" required autofocus name="username">
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" required name="password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <!-- stay signed in  -->
<!--                    <div class="animated-checkbox">-->
<!--                        <label class="semibold-text">-->
<!--                            <input type="checkbox"><span class="label-text">Stay Signed in</span>-->
<!--                        </label>-->
<!--                    </div>-->
                    <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
                    <p class="semibold-text mb-0"><a href="login/register.php">Sing Up</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button type="submit" name="btn_submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
        <form class="forget-form" action="#">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-20">
                <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>
    </div>
</section>
</body>
<script src="vendor/vali-admin/js/jquery-2.1.4.min.js"></script>
<script src="vendor/vali-admin/js/bootstrap.min.js"></script>
<script src="vendor/vali-admin/js/plugins/pace.min.js"></script>
<script src="vendor/vali-admin/js/main.js"></script>
</html>