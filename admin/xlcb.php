<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 12/06/2018
 * Time: 1:46 CH
 */ ?>

<div class="container">
    <h2>Danh sách xếp loại cán bộ lớp</h2>
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
            $query = "SELECT khoa.tenkhoa,lop.malop,bc_ky.ki,bc_ky.nam_hoc,bc_ky.lop_truong,bc_ky.xl_lt,bc_ky.lop_pho_ht,bc_ky.xl_lp_ht,bc_ky.lop_pho_ds,bc_ky.xl_lp_ds FROM bc_ky join lop on lop.id=bc_ky.id_lop join khoa on lop.id_khoa=khoa.id where lop.id=".$_SESSION['lop']['id'];
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