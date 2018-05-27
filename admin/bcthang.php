<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:24 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
    ?>
    <div class="container">
        <div class="title">
            <h3 class="text-center">Báo cáo theo tháng</h3>
        </div>
        <div><a href="index.php?page=addbcthang" class="btn btn-success">
                Thêm mới báo cáo
            </a></div>

    </div>
<?php } else {
    header("location:index.php");
} ?>
