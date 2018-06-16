

<?php
ob_start();
?>
<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {

if (!empty($_GET['id'])) {
    $que = "select * from bc_loptruong where id =".$_GET['id'];
    $rows = $db -> query($que);
    $val = $rows -> fetch();
}
?>
<br>
        <div class="title">
            <h3>
                Thêm mới báo cáo hàng ngày
            </h3>
        </div>
            <div class="title">
                <h4>Thông tin chi tiết</h4>
                <form action="" method="post">
                    <input type="hidden" name="id_lop" value="<?php echo @$_SESSION['loptruong']['id_lop'] ?>">
                    <input type="hidden" name="nguoi_tao" value="<?php echo @$_SESSION['loptruong']['hoten'] ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php $today = getdate(); ?>
                                <label for="">Ngày:</label>
                                <input type="date" name="ngay_tao" value="<?php echo date("Y-m-d", $today[0]) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>
                        <div>
                            <p class="blue"><b>Thông tin sĩ số lớp</b></p>
                            <div class="form-group">
                                <div class="col-sm-4">Sỹ số lớp:</div>
                                <div class="col-sm-8"><input name="si_so" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" disabled
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi học:</div>
                                <div class="col-sm-8"><input name="di_hoc" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" disabled
                                                             value="<?php echo @$val['di_hoc'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi muộn:</div>
                                <div class="col-sm-8"><input name="di_muon" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" disabled
                                                             value="<?php echo @$val['di_muon'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên học hộ:</div>
                                <div class="col-sm-8"><input name="hoc_ho" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" disabled
                                                             value="<?php echo @$val['hoc_ho'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">Tiết bắt đầu:
                                    <input type="text" name="tiet_bd" class="form-control" value="<?php echo @$val['tiet_bd'] ?>" disabled>
                                </div>
                                <div class="col-sm-6">
                                    Tiết kết thúc:
                                    <input type="text" name="tiet_kt" class="form-control" value="<?php echo @$val['tiet_kt'] ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Nội dung chi tiết:</div>
                                <div class="col-sm-8">
                                        <textarea name="noi_dung" rows="4" class="form-control"
                                                  placeholder="Thông tin sinh viên vi phạm kỷ luật" disabled
                                                  value=""><?php echo @$val['noi_dung'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else {
    header("location:index.php");
} ?>