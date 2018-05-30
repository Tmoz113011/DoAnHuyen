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
            <h3 class="text-center">Báo cáo theo kì học</h3>
        </div>
        <div><a href="index.php?page=addbcky" class="btn btn-success">
                Thêm mới báo cáo
            </a></div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Khóa</th>
                <th>Lớp</th>
                <th>Kỳ</th>
                <th>Năm học</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>K65</td>
                <td>HT23</td>
                <td>Kỳ 2</td>
                <td>2017-2018</td>
                <td>
                    <a href="index.php?page=ctbcky" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
<?php } else {
    header("location:index.php");
} ?>
