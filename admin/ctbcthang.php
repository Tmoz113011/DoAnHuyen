<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:37 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
    ?>
    <div class="container">
        <div class="row">
            <div class="title">
                <h3>
                    Chi tiết báo cáo tháng
                </h3>
            </div>
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <?php $queryKhoa = "SELECT * FROM khoahoc";
                            $rows_Khoa = $db->query($queryKhoa); ?>
                            <div class="form-group">
                                <label for=""> Khóa học:</label>
                                <select name="khoaHoc" class="form-control" id="">
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
                                <?php $queryLop = "SELECT * FROM `lop`";
                                $row_lop = $db->query($queryLop);
                                ?>
                                <select name="lop" class="form-control" id="">
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
                                <select name="thang" class="form-control" id="">
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
                                <select name="ky" class="form-control" id="">
                                    <option value="1">
                                        Kỳ I
                                    </option>
                                    <option value="2">
                                        Kỳ II
                                    </option>
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
                                <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 40"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Ghi chú:</div>
                                <div class="col-sm-8">
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>2. Thông tin sỹ số lớp</b></p>
                            <div class="form-group">
                                <div class="col-sm-4">Sỹ số lớp:</div>
                                <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 40"
                                                             class="form-control"></div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>3. Thông tin sinh viên vi phạm nội quy</b></p>

                            <div class="form-group">
                                <div class="col-sm-4">3.1 Sinh viên đi học muộn, học hộ:</div>
                                <div class="col-sm-8">
                                    <input type="radio" name="3.1" class="" value="1"> <span>Có</span>
                                    <input type="radio" name="3.1" class="" value="0">
                                    <span>Không</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">3.2 100% sinh viên đeo thẻ khi vào lớp:</div>
                                <div class="col-sm-8">
                                    <input type="radio" name="3.2" class="" value="1"> <span>Đạt</span>
                                    <input type="radio" name="3.2" class="" value="0">
                                    <span>Không đạt</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">3.3 Sinh viên ngủ gật trong lớp:</div>
                                <div class="col-sm-8">
                                    <input type="radio" name="3.3" class="" value="1"> <span>Có</span>
                                    <input type="radio" name="3.3" class="" value="0">
                                    <span>Không</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Số lượng bị sinh viên vi phạm kỷ luật:</div>
                                <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 4"
                                                             class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Nội dung chi tiết:</div>
                                <div class="col-sm-8">
                                        <textarea rows="4" class="form-control"
                                                  placeholder="Thông tin sinh viên vi phạm kỷ luật"></textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>4. Thông tin đóng bảo hiểm y tế</b></p>
                            <div class="form-group">
                                <div class="col-sm-4">Số lượng sinh viên đã đóng bảo hiểm:</div>
                                <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 40"
                                                             class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Nội dung chi tiết:</div>
                                <div class="col-sm-8">
                                        <textarea rows="4" class="form-control"
                                                  placeholder="Thông tin chưa đóng bảo hiểm"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
