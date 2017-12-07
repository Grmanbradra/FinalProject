<aside class="main-sidebar hidden-print">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="images/18010293_431214710566284_4201934629033630442_n.jpg" alt="User Image"></div>
            <div class="pull-left info">
                <p><?=$_SESSION['user']['name'] ?></p>
                <p class="designation"><?=$_SESSION['user']['email'] ?></p>
            </div>
        </div>

        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="<?=active_page($txt['menu_index']['file_name'])?>"><a href="<?=url($txt['menu_index']['file_name']) ?>"><i class="fa fa-dashboard"></i><span><?=$txt['menu_index']['name']?></span></a></li>

            <li class="treeview <?=active_page_arr($txt['menu_user']['sub_file'])?>">
                <a href="#"><i class="fa fa-laptop"></i><span><?=$txt['menu_user']['name']?></span><i class="fa fa-angle-right"></i></a>

                <ul class="treeview-menu">
                    <?php for($i = 0; $i < count($txt['menu_user']['sub_menu']); $i++) { ?>
                    <li><a href="<?=url($txt['menu_user']['sub_file'][$i]) ?>"><i class="fa fa-circle-o"></i> <?=$txt['menu_user']['sub_menu'][$i] ?></a></li>
                    <?php } ?>
                </ul>
            </li>

            <li class="treeview <?=active_page_arr($txt['menu_admin']['sub_file'])?>">
                <a href="#"><i class="fa fa-th-list"></i><span><?=$txt['menu_admin']['name']?></span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <?php if(count($txt['menu_admin']['sub_menu']) > 0 && isset($_SESSION['user']) && $_SESSION['user']['permission'] == 1) { ?>

                        <?php for($i = 0; $i < count($txt['menu_admin']['sub_menu']); $i++) { ?>
                            <li><a href="<?=url($txt['menu_admin']['sub_file'][$i]) ?>"><i class="fa fa-circle-o"></i> <?=$txt['menu_admin']['sub_menu'][$i] ?></a></li>
                        <?php } ?>

                    <?php } else { ?>
                        <li><a href="#"><i class="fa fa-circle-o"></i> <?=$txt['no_permission']?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>

    </section>
</aside>