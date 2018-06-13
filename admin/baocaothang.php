<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
    ?>
    <div class="container">
        <div class="title">
            <h3 class="text-center">Báo cáo theo tháng</h3>
        </div>
        <hr>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Khóa</th>
                <th>Lớp</th>
                <th>Tháng</th>
                <th>Kỳ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT khoa.tenkhoa,lop.malop,bc_thang.ki,bc_thang.thang,bc_thang.id FROM bc_thang join lop on lop.id=bc_thang.id_lop join khoa on lop.id_khoa=khoa.id";
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
                    <a href="index.php?page=ctbcthang&id=<?php echo $value[4] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    
                </td>
            </tr>
        <?php } ?>
            </tbody>
        </table>


    </div>
<?php } else {
    header("location:index.php");
} ?>
