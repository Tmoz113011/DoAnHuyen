<div class="col-md-3 mg-0">
    <?php
    //admin
    if (!empty($_SESSION['login_us'])) {
        print_r($_SESSION['login_us']);
        if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) { ?>
            <li><a href="index.php?page=qlkhoa"><i class="fa fa-list-alt"></i> Quản lý khoa</a></li>
            <li><a href="index.php?page=qlnganh"><i class="fa fa-list-alt"></i> Quản lý ngành</a></li>
            <li><a href="index.php?page=qllop"><i class="fa fa-list-alt"></i> Quản lý lớp</a></li>
            <li><a href="index.php?page=qlkhoahoc"><i class="fa fa-list-alt"></i> Quản lý khóa học</a></li>
            <li><a href="index.php?page=baocao"><i class="fa fa-list-alt"></i> Báo cáo</a></li>
            <li><a href="index.php?page=nguoidung"><i class="fa fa-address-card-o"></i> Quản lý người dùng</a></li>
            <li><a href="index.php?page=logout"><i class="  glyphicon glyphicon-log-out"></i> Thoát </a></li>
        <?php } //giao viên
        elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
            ?>
            <li><a href="index.php?page=bcthang"><i class="fa fa-list-alt"></i> Báo cáo theo tháng</a></li>
            <li><a href="index.php?page=bcky"><i class="fa fa-list-alt"></i> Báo cáo theo kỳ</a></li>
            <li><a href="index.php?page=dkshl"><i class="fa fa-list-alt"></i> Đăng ký sinh hoạt lớp</a></li>
            <li><a href="index.php?page=dgxl"><i class="fa fa-list-alt"></i> Đánh giá xếp loại</a></li>
            <li><a href="index.php?page=xlcb"><i class="fa fa-address-card-o"></i> Xếp loại cán bộ lớp</a></li>
            <li><a href="index.php?page=logout"><i class="  glyphicon glyphicon-log-out"></i> Thoát </a></li>
            <?php
        } //thanhtra
        elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
            if (isset($_REQUEST['page'])) {

            }
        }
    }
    ?>

</div>