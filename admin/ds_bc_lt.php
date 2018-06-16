<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
?>
<br>
<form action="" method="get" accept-charset="utf-8">
    <input type="hidden" name="page" value="ds_bc_lt">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Từ ngày:</label>
                <input type="date" name="tu_ngay" value="<?php echo @$_GET['tu_ngay'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Đến ngày:</label>
                <input type="date" name="den_ngay" value="<?php echo @$_GET['den_ngay'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>
    <div class="title">
        <h3 class="text-center">Báo cáo theo tháng</h3>
    </div>
    <hr>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Người tạo</th>
                <th>Ngày</th>
                <th>Sĩ số</th>
                <th>Sinh viên đi học</th>
                <th>Đi học muộn</th>
                <th>Đi học hộ</th>
                <th>Tiết bắt đầu</th>
                <th>Tiết kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "select * from bc_loptruong";
            if (!empty($_REQUEST['tu_ngay'])&&!empty($_REQUEST['den_ngay'])) {
                $query.= " where ngay_tao >= '".$_REQUEST['tu_ngay']."' and ngay_tao <= '".$_REQUEST['den_ngay']."'";
            }
            elseif (!empty($_REQUEST['tu_ngay'])) {
                $query.= " where ngay_tao >= '".$_REQUEST['tu_ngay']."'";
            }
            elseif (!empty($_REQUEST['den_ngay'])) {
                $query.= " where ngay_tao <= '".$_REQUEST['den_ngay']."'";
            }
            $rows = $db -> query($query);
            $i = 0;
            foreach ($rows as $key => $value) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $value['nguoi_tao'] ?></td>
                <td><?php echo $value['ngay_tao'] ?></td>
                <td><?php echo $value['si_so'] ?></td>
                <td><?php echo $value['di_hoc'] ?></td>
                <td><?php echo $value['di_muon'] ?></td>
                <td><?php echo $value['hoc_ho'] ?></td>
                <td><?php echo $value['tiet_bd'] ?></td>
                <td><?php echo $value['tiet_kt'] ?></td>
                <td>
                    <a href="index.php?page=xem_bc_lt&id=<?php echo $value['id'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } else {
header("location:index.php");
} ?>