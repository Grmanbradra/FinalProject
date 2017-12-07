<?PHP
session_start();
if (!isset($_SESSION['user']['name']) || !isset($_SESSION['user']['permission'])) {
    header('location:login.php');
}
error_reporting(1);
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

<!-- Navigation -->
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

<div class="container">
    <h2>Input File</h2>
    <form action="">
            <center>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user">Name Book:</i></span>
                <input id="input_name_book" type="text" class="form-control" name="input_name_book" placeholder="Name Book">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user">Author:</i></span>
                <input id="input_author" type="text" class="form-control" name="input_author" placeholder="Author.">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user">Year:</i></span>
                <input id="input_date" type="date" class="form-control" name="input_date" placeholder="Year.">
            </div>
            <!--UploadFile-->
            <div style="height: 450px; width: 80%; margin: auto">
                <center>
                    <div style="padding-top: 20%;">
<!--                        <form name="form1" method="post" action="" enctype="multipart/form-data">-->
                            <input type="file" name="fileData">
                            <input name="btnSubmit" type="submit" value="Submit">
<!--                        </form>-->
                    </div>
                </center>
            </div>
        </center>
    </form>
</div>

<!-- Footer -->
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

<?php

if (isset($_FILES['fileData'])) {
    if (is_uploaded_file($_FILES['fileData']['tmp_name'])) {
        $name = basename($_FILES['fileData']['name'], ".pdf");
        $file_name = $name . "." . pathinfo(basename($_FILES['fileData']['name']), PATHINFO_EXTENSION);
        if (strrpos($name, "c") !== false || strrpos($name, "python") !== false || strrpos($name, "php") !== false) {
            $upload_path = "box/Programing/" . $file_name;
            move_uploaded_file($_FILES['fileData']['tmp_name'], $upload_path);
            header("Location: index.php");
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        } else if (strrpos($name, "windows") !== false || strrpos($name, "linux") !== false || strrpos($name, "unix") !== false) {
            $upload_path = "box/Operating/" . $file_name;
            move_uploaded_file($_FILES['fileData']['tmp_name'], $upload_path);
            header("Location: index.php");
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        } else if (strrpos($name, "calculas") !== false || strrpos($name, "security") !== false || strrpos($name, "harddisk") !== false) {
            $upload_path = "box/General/" . $file_name;
            move_uploaded_file($_FILES['fileData']['tmp_name'], $upload_path);
            header("Location: index.php");
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        } else {
            $upload_path = "box/Other/" . $file_name;
            move_uploaded_file($_FILES['fileData']['tmp_name'], $upload_path);
            header("Location: index.php");
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        }
    }
}
?>


</body>

</html>
