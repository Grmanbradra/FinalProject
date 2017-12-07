<?php
require_once 'login/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Manage Category System Automatically with Web API</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <link href="css/upload.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"> Manage Category System Automatically with Web API</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">เพิ่มไฟล์
                        <!--<span class="sr-only">(current)</span>-->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="box.php">คลังข้อมูล</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<center>
    <form action="login/check_login.php" name="login" method="post">
        <table>
            <tr>
                <td colspan="2" style="text-align: center">Sign in</td>
                <td rowspan="3"><input type="submit" name="btnSignin" value="Sign in"/></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td><a href="#" /><h4>Forget Password</h4> </td>
                <td colspan="2" align="center"><a href="login/register.php" /><h4>Sign up</h4></td>
            </tr>
            <tr>

            </tr>
        </table>
    </form>

</center>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>