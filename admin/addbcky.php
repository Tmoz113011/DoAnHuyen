<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:37 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
  
?>

<?php 
if (!empty($_GET['id'])) {
    $que = "select * from bc_ky where id =".$_GET['id'];
    $rows = $db -> query($que);
    $value = $rows -> fetch();
}
if (!empty($_POST['submit'])) {
$ki = $_POST['ki'];
$nam_hoc = $_POST['nam_hoc'];
$tong_sv = $_POST['tong_sv'];
$tbc = $_POST['tbc'];
$loai_xs = $_POST['loai_xs'];
$loai_gioi = $_POST['loai_gioi'];
$loai_kha = $_POST['loai_kha'];
$loai_tb = $_POST['loai_tb'];
$loai_yeu = $_POST['loai_yeu'];
$tapthe_tt_xs = (!empty($_POST['tapthe_tt_xs']))?1:0;
$dat_giai = (!empty($_POST['dat_giai']))?1:0;
$thamgia_hd = (!empty($_POST['thamgia_hd']))?1:0;
$duoc_knapdang = (!empty($_POST['duoc_knapdang']))?1:0;
$lop_truong = $_POST['lop_truong'];
$xl_lt = $_POST['xl_lt'];
$lop_pho_ht = $_POST['lop_pho_ht'];
$xl_lp_ht = $_POST['xl_lp_ht'];
$lop_pho_ds = $_POST['lop_pho_ds'];
$xl_lp_ds = $_POST['xl_lp_ds'];

if (empty($_POST['id'])) {
$query = "INSERT INTO `bc_ky`( `id_lop`, `ki`, `nam_hoc`, `tong_sv`, `tbc`, `loai_xs`, `loai_gioi`, `loai_kha`, `loai_tb`, `loai_yeu`, `tapthe_tt_xs`, `dat_giai`, `thamgia_hd`, `duoc_knapdang`, `lop_truong`, `xl_lt`, `lop_pho_ht`, `xl_lp_ht`, `lop_pho_ds`, `xl_lp_ds`) VALUES (".$_SESSION['lop']['id'].",$ki,'$nam_hoc' ,$tong_sv ,$tbc ,$loai_xs ,$loai_gioi ,$loai_kha ,$loai_tb ,$loai_yeu ,$tapthe_tt_xs ,$dat_giai ,$thamgia_hd ,$duoc_knapdang ,'$lop_truong' ,$xl_lt ,'$lop_pho_ht' ,$xl_lp_ht ,'$lop_pho_ds' ,$xl_lp_ds)";
}
else
{
    $query = "UPDATE `bc_ky` SET  `ki`=$ki,`nam_hoc`='$nam_hoc', `tong_sv`=$tong_sv, `tbc`=$tbc, `loai_xs`=$loai_xs, `loai_gioi`=$loai_gioi, `loai_kha`=$loai_kha, `loai_tb`=$loai_tb, `loai_yeu`=$loai_yeu, `tapthe_tt_xs`=$tapthe_tt_xs, `dat_giai`=$dat_giai, `thamgia_hd`=$thamgia_hd, `duoc_knapdang`=$duoc_knapdang, `lop_truong`=$lop_truong, `xl_lt`=$xl_lt, `lop_pho_ht`=$lop_pho_ht, `xl_lp_ht`=$xl_lp_ht, `lop_pho_ds`=$lop_pho_ds, `xl_lp_ds`=$xl_lp_ds WHERE id=". $_GET['id'];
}
$save = $db->exec($query);
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
                                    <select name="ki" class="form-control" id="" required="">
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
                                    <select name="nam_hoc" class="form-control" id="" required="">
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
                                                             class="form-control" required="" value="<?php echo @$value[4] ?>"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">Số lượng SV có điểm TBC >= 2.00:</div>
                                <div class="col-sm-8">
                                    <div class="col-sm-8"><input name="tbc" type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control" required=""  value="<?php echo @$value[5] ?>"></div>
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
                                                                     class="form-control" required="" value="<?php echo @$value[6] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại giỏi:</div>
                                        <div class="col-sm-8"><input name="loai_gioi" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" required="" value="<?php echo @$value[7] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại khá:</div>
                                        <div class="col-sm-8"><input name="loai_kha" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" required="" value="<?php echo @$value[8] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại trung bình:</div>
                                        <div class="col-sm-8"><input name="loai_tb" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" required="" value="<?php echo @$value[9] ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại yếu:</div>
                                        <div class="col-sm-8"><input name="loai_yeu" type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control" required="" value="<?php echo @$value[10] ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>3. Hoạt động phong trào</b></p>
                            <div class="form-group">
                                <input type="checkbox" name="tapthe_tt_xs" value="1" <?php echo (@$value[11]==1)?'checked':'' ?>>
                                <label for=""> Tập thể lớp đạt tiên tiến, xuất sắc</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="dat_giai" value="1"  <?php echo (@$value[12]==1)?'checked':'' ?>>
                                <label for=""> Lớp có sinh viên đạt giải thi sinh viên giỏi, Olympic, văn hóa, văn
                                    nghệ, thể thao từ Cấp Trường trở lên</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="thamgia_hd" value="1" <?php echo (@$value[13]==1)?'checked':'' ?>>
                                <label for=""> Lớp có nhiều sinh viên tham gia các hoạt dộng vì cộng đồng (tình
                                    nguyện, hiến máu nhân đạo, tự quản...)</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="duoc_knapdang" value="1" <?php echo (@$value[14]==1)?'checked':'' ?>>
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
                                                                 placeholder="Họ và tên" required="" value="<?php echo @$value[15] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lt" id="" class="form-control" required="">
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
                                                                 placeholder="Họ và tên" required="" value="<?php echo @$value[17] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lp_ht" id="" class="form-control" required="">
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
                                                                 placeholder="Họ và tên" required="" value="<?php echo @$value[19] ?>"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="xl_lp_ds" id="" class="form-control" required="">
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
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" name="submit"  value="Lưu thông tin">
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
