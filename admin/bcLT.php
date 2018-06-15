<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 15/06/2018
 * Time: 11:20 SA
 */
?>

<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý giáo viên - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/css/style.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <style>
        .mt-2 {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="title">
            <h3>
                Thêm mới báo cáo hàng ngày
            </h3>
        </div>
        <div class="col-sm-12">
            <div class="title">
                <h4>Thông tin chi tiết</h4>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo @$val['id'] ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php $today = getdate(); ?>
                                <label for="">Ngày:</label>
                                <input type="date" name="ngay" value="<?php echo date("Y-m-d", $today[0]) ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div>
                            <p class="blue"><b>Thông tin sỹ số lớp</b></p>
                            <div class="form-group">
                                <div class="col-sm-4">Sỹ số lớp:</div>
                                <div class="col-sm-8"><input name="si_so" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi học:</div>
                                <div class="col-sm-8"><input name="di_hoc" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi muộn:</div>
                                <div class="col-sm-8"><input name="di_hoc" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên học hộ:</div>
                                <div class="col-sm-8"><input name="di_hoc" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">Tiết bắt đầu:
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    Tiết kết thúc:
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Nội dung chi tiết:</div>
                                <div class="col-sm-8">
                                        <textarea name="noidung_vipham" rows="4" class="form-control"
                                                  placeholder="Thông tin sinh viên vi phạm kỷ luật" required=""
                                                  value=""><?php echo @$val['noidung_vipham'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" name="submit" value="Lưu thông tin">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
