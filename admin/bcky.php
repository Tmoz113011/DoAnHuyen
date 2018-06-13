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
                <th>STT</th>
                <th>Khóa</th>
                <th>Lớp</th>
                <th>Kỳ</th>
                <th>Năm học</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT khoa.tenkhoa,lop.malop,bc_ky.ki,bc_ky.nam_hoc,bc_ky.id FROM bc_ky join lop on lop.id=bc_ky.id_lop join khoa on lop.id_khoa=khoa.id where lop.id=".$_SESSION['lop']['id'];
            $rows = $db -> query($query);
            $i = 0;
            foreach ($rows as $key => $value) { 
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $value['0'] ?></td>
                <td><?php echo $value['1'] ?></td>
                <td><?php echo $value['2'] ?></td>
                <td><?php echo $value['3'] ?></td>
                
                <td>
                    <a href="index.php?page=ctbcky&id=<?php echo $value['4'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="index.php?page=addbcky&id=<?php echo $value['4'] ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="index.php?page=del_bcky&id=<?php echo $value['4'] ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php } ?>
            </tbody>
        </table>

    </div>
<?php } else {
    header("location:index.php");
} ?>
