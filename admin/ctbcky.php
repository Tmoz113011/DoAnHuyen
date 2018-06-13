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
    $que = "select * from bc_ky where id =".$_GET['id'];
    $rows = $db -> query($que);
    $value = $rows -> fetch();
}

 ?>
    <div class="container">
        <div class="row">
            <div class="title">
                <h3>
                    Thêm mới báo cáo kỳ
                </h3>
            </div>
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo @$_GET['id'] ?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Chọn lớp:</label>
                                    <?php $queryLop = "SELECT * FROM `lop` where id = ". $_SESSION['lop']['id'];
                                    $row_lop = $db->query($queryLop);
                                    ?>
                                    <select name="lop" class="form-control" id="" disabled="">
                                        <?php foreach ($row_lop as $val) { ?>
                                            <option value="<?php echo $val['id'] ?>">
                                                <?php echo $val['malop'] ?>
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
                                            <option value="<?php echo $i ?>" <?php echo (@$value[2]==$i)?'selected':'' ?>>
                                                Kì <?php echo $i ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Năm học:</label>
                                    <select name="nam_hoc" class="form-control" id="" disabled>
                                        <?php for ($i = 2000; $i <= 2030; $i++) { ?>
                                        <option value="<?php echo $i.'-'.($i+1); ?>" <?php echo (@$value[3]==$i.'-'.($i+1))?'selected':'' ?>>
                                            <?php echo $i.'-'.($i+1); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div>
                            <p class="blue"><b>1. Kết quả học tập</b></p>
                            <div class="form-group row">
                                <div class="col-sm-4">Tổng số sinh viên:</div>
                                <div class="col-sm-8"><input name="tong_sv" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" disabled value="<?php echo @$value[4] ?>"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">Số lượng SV có điểm TBC >= 2.00:</div>
                                <div class="col-sm-8">
                                    <div class="col-sm-8"><input name="tbc" type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control" disabled  value="<?php echo @$value[5] ?>"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>2. Kết quả rèn luyện</b></p>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại xuất sắc:</div>
                                        <div class="col-sm-8"><input name="loai_xs" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" disabled value="<?php echo @$value[6] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại giỏi:</div>
                                        <div class="col-sm-8"><input name="loai_gioi" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" disabled value="<?php echo @$value[7] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại khá:</div>
                                        <div class="col-sm-8"><input name="loai_kha" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" disabled value="<?php echo @$value[8] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại trung bình:</div>
                                        <div class="col-sm-8"><input name="loai_tb" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" disabled value="<?php echo @$value[9] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại yếu:</div>
                                        <div class="col-sm-8"><input name="loai_yeu" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" disabled value="<?php echo @$value[10] ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>3. Hoạt động phong trào</b></p>
                            <div class="form-group">
                                <input type="checkbox" name="tapthe_tt_xs" value="<?php echo @$value[11] ?>" <?php echo (@$value[11]==1)?'checked':'' ?>>
                                <label for=""> Tập thể lớp đạt tiên tiến, xuất sắc</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="dat_giai" value="<?php echo @$value[12] ?>"  <?php echo (@$value[12]==1)?'checked':'' ?>>
                                <label for=""> Lớp có sinh viên đạt giải thi sinh viên giỏi, Olympic, văn hóa, văn
                                    nghệ, thể thao từ Cấp Trường trở lên</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="thamgia_hd" value="<?php echo @$value[13] ?>" <?php echo (@$value[13]==1)?'checked':'' ?>>
                                <label for=""> Lớp có nhiều sinh viên tham gia các hoạt dộng vì cộng đồng (tình
                                    nguyện, hiến máu nhân đạo, tự quản...)</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name=duoc_knapdang" value="<?php echo @$value[14] ?>" <?php echo (@$value[14]==1)?'checked':'' ?>>
                                <label for=""> Lớp có sinh viên được kết nạp Đảng trong kỳ</label>
                            </div>

                        </div>

                        <div>
                            <p class="blue"><b>4. Xếp loại cán bộ lớp</b></p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <b>Lớp trưởng:</b>
                                    </div>
                                    <div class="col-sm-5"><input name="lop_truong"  type="text" class="form-control"
                                                                 placeholder="Họ và tên" disabled value="<?php echo @$value[15] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lt" id="" class="form-control" disabled>
                                            <option value="1" <?php echo (!empty($value[16])&&$value[16]==1)?'selected':'' ?>>A</option>
                                            <option value="2" <?php echo (!empty($value[16])&&$value[16]==2)?'selected':'' ?>>B</option>
                                            <option value="3" <?php echo (!empty($value[16])&&$value[16]==3)?'selected':'' ?>>C</option>
                                            <option value="4" <?php echo (!empty($value[16])&&$value[16]==4)?'selected':'' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <b>Lớp phó học tập:</b>
                                    </div>
                                    <div class="col-sm-5"><input name="lop_pho_ht"  type="text" class="form-control"
                                                                 placeholder="Họ và tên" disabled value="<?php echo @$value[17] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lp_ht" id="" class="form-control" disabled>
                                            <option value="1" <?php echo (!empty($value[18])&&$value[18]==1)?'selected':'' ?>>A</option>
                                            <option value="2" <?php echo (!empty($value[18])&&$value[18]==2)?'selected':'' ?>>B</option>
                                            <option value="3" <?php echo (!empty($value[18])&&$value[18]==3)?'selected':'' ?>>C</option>
                                            <option value="4" <?php echo (!empty($value[18])&&$value[18]==4)?'selected':'' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <b>Lớp phó đời sống:</b>
                                    </div>
                                    <div class="col-sm-5"><input name="lop_pho_ds"  type="text" class="form-control"
                                                                 placeholder="Họ và tên" disabled value="<?php echo @$value[19] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lp_ds" id="" class="form-control" disabled>
                                            <option value="1" <?php echo (!empty($value[20])&&$value[20]==1)?'selected':'' ?>>A</option>
                                            <option value="2" <?php echo (!empty($value[20])&&$value[20]==2)?'selected':'' ?>>B</option>
                                            <option value="3" <?php echo (!empty($value[20])&&$value[20]==3)?'selected':'' ?>>C</option>
                                            <option value="4" <?php echo (!empty($value[20])&&$value[20]==4)?'selected':'' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
