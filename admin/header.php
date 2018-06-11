<?php
session_start();
if (!isset($_SESSION['login_us'])) {
    header("location:login.php");
}
?>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Hệ thống quản lý công tác giáo viên chủ nghiệm</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <!--                --><?php //include __DIR__ . '/sidebar.php'; ?>
                <?php
                //admin
                if (!empty($_SESSION['login_us'])) {
                    if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) { ?>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "qlkhoa") ? "active" : "" ?>"><a
                                    href="index.php?page=qlkhoa"><i class="fa fa-list-alt"></i> Quản lý khoa</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "qlnganh") ? "active" : "" ?>">
                            <a
                                    href="index.php?page=qlnganh"><i class="fa fa-list-alt"></i> Quản lý ngành</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "qllop") ? "active" : "" ?>"><a
                                    href="index.php?page=qllop"><i class="fa fa-list-alt"></i> Quản lý lớp</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "qlkhoahoc") ? "active" : "" ?>">
                            <a
                                    href="index.php?page=qlkhoahoc"><i class="fa fa-list-alt"></i> Quản lý khóa học</a>
                        </li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "baocao") ? "active" : "" ?>"><a
                                    href="index.php?page=baocao"><i class="fa fa-list-alt"></i> Báo cáo</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "nguoidung") ? "active" : "" ?>">
                            <a
                                    href="index.php?page=nguoidung"><i class="fa fa-users"></i> Quản lý người
                                dùng</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "logout") ? "active" : "" ?>"><a
                                    href="index.php?page=logout"><i class="fa fa-power-off"></i> Thoát </a>
                        </li>
                    <?php } //giao viên
                    elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
                        ?>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "bcthang") ? "active" : "" ?>">
                            <a
                                    href="index.php?page=bcthang"><i class="fa fa-list-alt"></i> Báo cáo theo tháng</a>
                        </li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "bcky") ? "active" : "" ?>"><a
                                    href="index.php?page=bcky"><i class="fa fa-list-alt"></i> Báo cáo theo kỳ</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "dkshl") ? "active" : "" ?>"><a
                                    href="index.php?page=ds_dkshl"><i class="fa fa-list-alt"></i> Đăng ký sinh hoạt lớp</a>
                        </li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "dgxl") ? "active" : "" ?>"><a
                                    href="index.php?page=dgxl"><i class="fa fa-list-alt"></i> Đánh giá xếp loại</a></li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "xlcb") ? "active" : "" ?>"><a
                                    href="index.php?page=xlcb"><i class="fa fa-address-card-o"></i> Xếp loại cán bộ lớp</a>
                        </li>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == "logout") ? "active" : "" ?>"><a
                                    href="index.php?page=logout"><i class="fa fa-power-off"></i> Thoát </a>
                        </li>
                        <?php
                    } //thanhtra
                    elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
                        if (isset($_REQUEST['page'])) {

                        }
                    }
                }
                ?>

                <!--                <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>-->
                <!--                <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>-->
                <!--                <li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>-->
                <!--                <li><a href="forms.html"><i class="fa fa-edit"></i> Forms</a></li>-->
                <!--                <li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>-->
                <!--                <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>-->
                <!--                <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>-->
                <!--                <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>-->
                <!--                <li class="dropdown">-->
                <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>-->
                <!--                        Dropdown <b class="caret"></b></a>-->
                <!--                    <ul class="dropdown-menu">-->
                <!--                        <li><a href="#">Dropdown Item</a></li>-->
                <!--                        <li><a href="#">Another Item</a></li>-->
                <!--                        <li><a href="#">Third Item</a></li>-->
                <!--                        <li><a href="#">Last Item</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
                <li>
                    <a href="javascript:void(0)"> Xin chào <?php echo $_SESSION['username'] ?>!</a>
                </li>
                <li>
                    <a href="index.php?page=logout"><i class="fa fa-power-off"></i>Thoát</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
