<?php

require_once __DIR__ . '/autoload_admin.php';

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

    <title><?=$txt['menu_admin']['sub_menu'][3]?> | <?=$txt['web_name'] ?></title>

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
                <h1><i class="fa fa-dashboard"></i> <?=$txt['menu_admin']['sub_menu'][3]?> </h1>
                <p><?=$txt['menu_admin']['name']?> </p>
            </div>
            <div>
                <ul class="breadcrumb">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li><?=$txt['menu_admin']['name']?> </li>
                    <li><a href="<?=url('manage_sub_cate.php') ?>"><?=$txt['menu_admin']['sub_menu'][3]?> </a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <a class="btn btn-primary btn-lg" href="<?=url('manage_sub_cate.php?action=create') ?>">เพิ่มข้อมูล</a>
                    <br>
                    <br>
                </div>

                <?php

                if (isset($_GET['action'])) {
                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                    if ($_GET['action'] == 'view') {
                        // id
                        include_once __DIR__ . '/process_page/manage_sub_cate/view.php';
                    }
                    elseif ($_GET['action'] == 'create') {
                        include_once __DIR__ . '/process_page/manage_sub_cate/create.php';
                    }
                    elseif ($_GET['action'] == 'insert') {
                        include_once __DIR__ . '/process_page/manage_sub_cate/insert.php';
                    }
                    elseif ($_GET['action'] == 'edit') {
                        // id
                        include_once __DIR__ . '/process_page/manage_sub_cate/edit.php';
                    }
                    elseif ($_GET['action'] == 'update') {
                        // id
                        include_once __DIR__ . '/process_page/manage_sub_cate/update.php';
                    }
                    elseif ($_GET['action'] == 'delete') {
                        // id
                        include_once __DIR__ . '/process_page/manage_sub_cate/delete.php';

                    } else {
                        echo '<script>window.location.href = "manage_sub_cate.php"</script>';
                    }
                } else {
                    // show all
                    include_once __DIR__ . '/process_page/manage_sub_cate/show-all.php';
                }
                ?>
            </div>
        </div>
    </div>


</div>
<!-- Javascripts-->
<script src="vendor/vali-admin/js/jquery-2.1.4.min.js"></script>
<script src="vendor/vali-admin/js/bootstrap.min.js"></script>
<script src="vendor/vali-admin/js/plugins/pace.min.js"></script>
<script src="vendor/vali-admin/js/main.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="vendor/vali-admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vendor/vali-admin/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="js/myFn.js"></script>

</body>
</html>
