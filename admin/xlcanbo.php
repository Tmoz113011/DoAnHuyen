<?php

if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && (in_array('1', $_SESSION['quyen'])||in_array('3', $_SESSION['quyen']))) {
    ?>
<br>
<form action="" method="get" accept-charset="utf-8">
    <input type="hidden" name="page" value="xlcanbo">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php $queryLop = "SELECT * FROM `lop`";
                $row_lop = $db->query($queryLop);
                ?>
                <select name="lop" class="form-control" id="" required="">
                    <option value="">Chọn lớp</option>
                    <?php foreach ($row_lop as $value) { ?>
                    <option value="<?php echo $value['id'] ?>" <?php echo (!empty($_REQUEST['lop'])&&$_REQUEST['lop']==$value['id'])?'selected':'' ?>>
                        <?php echo $value['malop'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>

<div class="container">
    <h2>Danh sách xếp loại cán bộ lớp</h2>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Khóa</th>
            <th>Lớp</th>
            <th>Kỳ</th>
            <th>Năm học</th>
            <th>Lớp trưởng</th>
            <th>Xếp loại</th>
            <th>Lớp phó học tập</th>
            <th>Xếp loại</th>
            <th>Lớp phó đời sống</th>
            <th>Xếp loại</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $query = "SELECT khoa.tenkhoa,lop.malop,bc_ky.ki,bc_ky.nam_hoc,bc_ky.lop_truong,bc_ky.xl_lt,bc_ky.lop_pho_ht,bc_ky.xl_lp_ht,bc_ky.lop_pho_ds,bc_ky.xl_lp_ds FROM bc_ky join lop on lop.id=bc_ky.id_lop join khoa on lop.id_khoa=khoa.id";
            if (!empty($_REQUEST['lop'])) {
                $query.= " where lop.id=".$_REQUEST['lop'];
            }
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
                <td><?php echo $value['4'] ?></td>
                <td>
                    <?php switch ($value['5']) {
                        case '1':
                            echo "A";
                            break;
                        
                        case '2':
                            echo "B";
                            break;
                        
                        case '3':
                            echo "C";
                            break;
                        
                        case '4':
                            echo "D";
                            break;
                        
                        default:
                            echo "";
                            break;
                    } ?>
                </td>
                <td><?php echo $value['6'] ?></td>
                <td>
                    <?php switch ($value['7']) {
                        case '1':
                            echo "A";
                            break;
                        
                        case '2':
                            echo "B";
                            break;
                        
                        case '3':
                            echo "C";
                            break;
                        
                        case '4':
                            echo "D";
                            break;
                        
                        default:
                            echo "";
                            break;
                    } ?>
                </td>
                <td><?php echo $value['8'] ?></td>
                <td>
                    <?php switch ($value['9']) {
                        case '1':
                            echo "A";
                            break;
                        
                        case '2':
                            echo "B";
                            break;
                        
                        case '3':
                            echo "C";
                            break;
                        
                        case '4':
                            echo "D";
                            break;
                        
                        default:
                            echo "";
                            break;
                    } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } else {
    header("location:index.php");
} ?>