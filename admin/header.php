<?php
session_start();
if (!isset($_SESSION['login_us'])) {
    header("location:login.php");
}
?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="">UTT</i> <span>Quản lý giáo viên</span></a>
        </div>
        <div class="clearfix"></div>
        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Thông tin chung</h3>
                <ul class="nav side-menu">
                    <?php include __DIR__ . '/sidebar.php'; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">

        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <?php echo @$_SESSION['username'] ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li>
                            <a href="index.php?page=suaTK">
                                Thông tin cá nhân
                            </a>
                        </li>
                        <li><a href="login.php?page=logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>