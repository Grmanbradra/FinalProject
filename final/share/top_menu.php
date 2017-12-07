<header class="main-header hidden-print"><a class="logo" href="<?=url('index2.php') ?>"><?=$txt['web_short_name']?></a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu">
            <ul class="top-nav">

                <!-- User Menu-->
                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu">
                        <li><a href="#"><i class="fa fa-cog fa-lg"></i> <?=$txt['setting']?></a></li>
                        <li><a href="#"><i class="fa fa-user fa-lg"></i> <?=$txt['profile']?></a></li>
                        <li><a href="<?=url('logout.php')?>"><i class="fa fa-sign-out fa-lg"></i> <?=$txt['logout']?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>