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
                    Thêm mới báo cáo kỳ
                </h3>
            </div>
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                    <form action="" method="post">
                        <div class="row">
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
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for=""> Năm học:</label>
                                    <select name="ky" class="form-control" id="">
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

                        <div>
                            <p class="blue"><b>1. Kết quả học tập</b></p>
                            <div class="form-group row">
                                <div class="col-sm-4">Tổng số sinh viên:</div>
                                <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 40"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">Số lượng SV có điểm TBC >= 2.00:</div>
                                <div class="col-sm-8">
                                    <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 40"
                                                                 class="form-control"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>2. Kết quả rèn luyện</b></p>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại xuất sắc:</div>
                                        <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại giỏi:</div>
                                        <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại khá:</div>
                                        <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại trung bình:</div>
                                        <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-4">Loại yếu:</div>
                                        <div class="col-sm-8"><input type="number" min="0" placeholder="VD: 15"
                                                                     class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="blue"><b>3. Hoạt động phong trào</b></p>
                            <div class="form-group">
                                <input type="checkbox" name="hd">
                                <label for=""> Tập thể lớp đạt tiên tiến, xuất sắc</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hd">
                                <label for=""> Lớp có sinh viên đạt giải thi sinh viên giỏi, Olympic, văn hóa, văn
                                    nghệ, thể thao từ Cấp Trường trở lên</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hd">
                                <label for=""> Lớp có nhiều sinh viên tham gia các hoạt dộng vì cộng đồng (tình
                                    nguyện, hiến máu nhân đạo, tự quản...)</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hd">
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
                                    <div class="col-sm-5"><input type="text" class="form-control"
                                                                 placeholder="Họ và tên"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="form-control">
                                            <option value="a">A</option>
                                            <option value="a">B</option>
                                            <option value="a">C</option>
                                            <option value="a">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <b>Lớp phó học tập:</b>
                                    </div>
                                    <div class="col-sm-5"><input type="text" class="form-control"
                                                                 placeholder="Họ và tên"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="form-control">
                                            <option value="a">A</option>
                                            <option value="a">B</option>
                                            <option value="a">C</option>
                                            <option value="a">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <b>Lớp phó đời sống:</b>
                                    </div>
                                    <div class="col-sm-5"><input type="text" class="form-control"
                                                                 placeholder="Họ và tên"></div>
                                    <div class="col-sm-2">Xếp loại:</div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="form-control">
                                            <option value="a">A</option>
                                            <option value="a">B</option>
                                            <option value="a">C</option>
                                            <option value="a">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Lưu thông tin">
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
