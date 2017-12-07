<?php
require_once __DIR__ . '/autoload_admin.php';
require_once 'config/connectdb.php';
?>

<?php
    $username = $_SESSION['user']['name'];
    $sql = "SELECT * FROM user_login WHERE user_name='$username'";
    $result = $conn->query($sql);

//    echo $username;
    $row = $result->fetch();
    print_r($result->fetch());
//    exit;
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

    <title>หน้าแรก | <?=$txt['web_name'] ?></title>

    <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/css/sweetalert2.min.css">
    <script src="vendor/sweetalert2/js/sweetalert2.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <?php include_once __DIR__ . '/share/top_menu.php' ?>

    <!-- Side-Nav-->
    <?php include_once __DIR__ . '/share/menu.php' ?>

    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
                <p>หน้าแรก</p>
            </div>
            <div>
                <ul class="breadcrumb">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li><a href="index.php">หน้าแรก</a></li>
                </ul>
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="login/update_user.php">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Username *</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Username:</i></span>
                            <input type="text" class="form-control" name="username" value="<?=$row['user_name'] ?>" placeholder="Enter your username" readonly/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Password:</i></span>
                            <input type="password" class="form-control" name="password" placeholder="Enter your Password"/>
<!--                            <input type="password" class="form-control" name="password" value="--><?//=$row['user_pass']?><!--"  placeholder="Enter your Password"/>-->
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Email:</i></span>
                            <input type="text" class="form-control" name="email" value="<?=$row['user_email']?>" placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Phone</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Phone:</i></span>
                            <input type="text" class="form-control" name="phone" value="<?=$row['user_phone']?>" placeholder="Enter your Phone"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Gender*</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Gender:</i></span>
                            <input type="text" class="form-control" name="gender" value="<?=$row['user_gender']?>" placeholder="Enter your Gender" readonly/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Confirm">
                </div>
            </form>
        </div>



</div>
<!-- Javascripts-->
<script src="vendor/vali-admin/js/jquery-2.1.4.min.js"></script>
<script src="vendor/vali-admin/js/bootstrap.min.js"></script>
<script src="vendor/vali-admin/js/plugins/pace.min.js"></script>
<script src="vendor/vali-admin/js/main.js"></script>

</body>
</html>