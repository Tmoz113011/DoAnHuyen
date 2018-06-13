<div class="container">
    <div class="row">
        <h3 class="text-center">Chào mừng bạn đến với trang quản trị</h3>
        <?php if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) { ?>
        <?php } elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) { ?>
            <div class="col-sm-3 mt-2">
                <a href="index.php?page=bcthang" class="btn btn-success btn-block">Báo cáo theo tháng</a>
            </div>
            <div class="col-sm-3 mt-2">
                <a href="index.php?page=bcky" class="btn btn-success btn-block">Báo cáo theo kỳ</a>
            </div>
            <div class="col-sm-3 mt-2">
                <a href="index.php?page=ds_dkshl" class="btn btn-success btn-block">Đăng ký sinh hoạt lớp</a>
            </div>
            <div class="col-sm-3 mt-2">
                <a href="index.php?page=dgxl" class="btn btn-success btn-block">Đánh giá xếp loại</a>
            </div>
            <br>
            <div class="col-sm-3 mt-2">
                <a href="index.php?page=xlcb" class="btn btn-success btn-block">Xếp loại cán bộ lớp</a>
            </div>
        <?php } ?>
    </div>
</div>