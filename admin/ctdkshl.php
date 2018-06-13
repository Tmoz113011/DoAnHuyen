<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:24 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
    ?>
<?php 
if (!empty($_GET['id'])) {
    $que = "select * from dky_sinhhoat where id =".$_GET['id'];
    $rows = $db -> query($que);
    $val = $rows -> fetch();
}

 ?>
    <div class="container">
        <div class="title">
            <h3 class="text-center">Thêm mới đăng ký lịch sinh hoạt lớp</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                </div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""> Chọn lớp:</label>
                                <?php $queryLop = "SELECT * FROM `lop` where id = ". $_SESSION['lop']['id'];
                                $row_lop = $db->query($queryLop);
                                ?>
                                <select name="lop" class="form-control" id="" disabled="">
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
                                <label for=""> Năm học:</label>
                                <select name="nam_hoc" class="form-control" id="" disabled>
                                    <option value="1">
                                        2017-2018
                                    </option>
                                    <option value="2">
                                        2018-2019
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Địa điểm</label></div>
                            <div class="col-sm-8">
                                <textarea name="dia_diem" id="" class="form-control" cols="30"
                                          rows="10" disabled><?php echo @$val['dia_diem'] ?></textarea>
                                <br>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Thành phần:</label></div>
                            <div class="col-sm-8">
                                <textarea name="thanh_phan" id="" class="form-control" cols="30"
                                          rows="10" disabled><?php echo @$val['thanh_phan'] ?></textarea>
                                <br>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Nội dung</label></div>
                            <div class="col-sm-8"><textarea name="noi_dung" id="" class="form-control" cols="30"
                                                            rows="10" disabled><?php echo @$val['noi_dung'] ?></textarea></div>
                            <br>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Thời gian</label></div>
                            <div class="col-sm-8">
                                <input name="thoi_gian" type="date" class="form-control" disabled value="<?php echo @$val['thoi_gian'] ?>">
                            </div>
                            <br/>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
