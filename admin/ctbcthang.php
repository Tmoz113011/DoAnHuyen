<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:37 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && (in_array('1', $_SESSION['quyen'])||in_array('2', $_SESSION['quyen'])||in_array('3', $_SESSION['quyen']))) {
    ?>

<?php 
if (!empty($_GET['id'])) {
    $que = "select * from bc_thang where id =".$_GET['id'];
    $rows = $db -> query($que);
    $val = $rows -> fetch();
}
 ?>
    <div class="container">
        <div class="row">
            <div class="title">
                <h3>
                    Thêm mới báo cáo tháng
                </h3>
            </div>
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo @$val['id'] ?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <?php $queryKhoa = "SELECT * FROM khoahoc where id = ". $_SESSION['lop']['id_khoahoc'];
                                $rows_Khoa = $db->query($queryKhoa); ?>
                                <div class="form-group">
                                    <label for=""> Khóa học:</label>
                                    <select name="khoaHoc" class="form-control" id="" disabled="">
                                        <?php foreach ($rows_Khoa as $item) { ?>
                                            <option value="<?php echo $item['id'] ?>">
                                                <?php echo $item['tenkhoahoc'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Chọn lớp:</label>
                                    <?php $queryLop = "SELECT * FROM `lop` where id = ". $_SESSION['lop']['id'];
                                    $row_lop = $db->query($queryLop);
                                    ?>
                                    <select name="lop" class="form-control" id="" disabled>
                                        <?php foreach ($row_lop as $value) { ?>
                                            <option value="<?php echo $value['id'] ?>">
                                                <?php echo $value['malop'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Tháng:</label>
                                    <select name="thang" class="form-control" id="" disabled>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                            <option value="<?php echo $i ?>">
                                                Tháng <?php echo $i ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Kỳ:</label>
                                    <select name="ki" class="form-control" id="" disabled>
                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                            <option value="<?php echo $i ?>">
                                                Kì <?php echo $i ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div>
                                <p class="blue"><b>1. Thông tin đóng học phí</b></p>
                                <div class="form-group">
                                    <div class="col-sm-4">Số lượng sinh viên đã đóng học phí:</div>
                                    <div class="col-sm-8"><input name="da_dong_hp" type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control" disabled value="<?php echo @$val['da_dong_hp'] ?>"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">Ghi chú:</div>
                                    <div class="col-sm-8">
                                        <textarea rows="4" class="form-control"  name="ghi_chu" disabled value=""><?php echo @$val['ghi_chu'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <p class="blue"><b>2. Thông tin sỹ số lớp</b></p>
                                <div class="form-group">
                                    <div class="col-sm-4">Sỹ số lớp:</div>
                                    <div class="col-sm-8"><input name="si_so" type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control" disabled value="<?php echo @$val['si_so'] ?>"></div>
                                </div>
                            </div>

                            <div>
                                <p class="blue"><b>3. Thông tin sinh viên vi phạm nội quy</b></p>

                                <div class="form-group">
                                    <div class="col-sm-4">3.1 Sinh viên đi học muộn, học hộ:</div>
                                    <div class="col-sm-8">
                                        <input name="di_muon_hoc_ho" type="radio" class="" value="1" disabled <?php echo (!empty($val['di_muon_hoc_ho'])&&$val['di_muon_hoc_ho']==1)?'checked':'' ?>> <span>Có</span>
                                        <input name="di_muon_hoc_ho" type="radio" class="" value="0" disabled <?php echo (!empty($val['di_muon_hoc_ho'])&&$val['di_muon_hoc_ho']==0)?'checked':'' ?>>
                                        <span>Không</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">3.2 100% sinh viên đeo thẻ khi vào lớp:</div>
                                    <div class="col-sm-8">
                                        <input name="deo_the" type="radio" class="" value="1" disabled <?php echo (!empty($val['deo_the'])&&$val['deo_the']==1)?'checked':'' ?>> <span>Đạt</span>
                                        <input name="deo_the" type="radio" class="" value="0" disabled <?php echo (!empty($val['deo_the'])&&$val['deo_the']==0)?'checked':'' ?>>
                                        <span>Không đạt</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">3.3 Sinh viên ngủ gật trong lớp:</div>
                                    <div class="col-sm-8">
                                        <input name="ngu_gat" type="radio" class="" value="1" disabled <?php echo (!empty($val[9])&&$val[9]==1)?'checked':'' ?>> <span>Có</span>
                                        <input name="ngu_gat" type="radio" class="" value="0" disabled <?php echo (!empty($val[0])&&$val[9]==0)?'checked':'' ?>>
                                        <span>Không</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">Số lượng bị sinh viên vi phạm kỷ luật:</div>
                                    <div class="col-sm-8"><input name="vi_pham" type="number" min="0" placeholder="VD: 4"
                                                                 class="form-control" disabled value="<?php echo @$val['vi_pham'] ?>"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">Nội dung chi tiết:</div>
                                    <div class="col-sm-8">
                                        <textarea name="noidung_vipham" rows="4" class="form-control"
                                                  placeholder="Thông tin sinh viên vi phạm kỷ luật" disabled value=""><?php echo @$val['noidung_vipham'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <p class="blue"><b>4. Thông tin đóng bảo hiểm y tế</b></p>
                                <div class="form-group">
                                    <div class="col-sm-4">Số lượng sinh viên đã đóng bảo hiểm:</div>
                                    <div class="col-sm-8"><input name="da_dong_bh" type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control" disabled value="<?php echo @$val['da_dong_bh'] ?>"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">Nội dung chi tiết:</div>
                                    <div class="col-sm-8">
                                        <textarea name="noidung_bh" rows="4" class="form-control"
                                                  placeholder="Thông tin chưa đóng bảo hiểm" disabled value=""><?php echo @$val['noidung_bh'] ?></textarea>
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
