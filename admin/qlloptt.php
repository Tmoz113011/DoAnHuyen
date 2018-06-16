<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
    $sqlgv = "SELECT `id`, `username`, `password`, `hoten`, `diachi`, `email`, `sdt`, `ngaytao`, `quyen` FROM `giangvien` WHERE quyen=2";
    $rowgv = $db->query($sqlgv);
    $sql = "SELECT lop.id,lop.tenlop,lop.malop,khoa.tenkhoa,khoa.id,khoahoc.id,khoahoc.tenkhoahoc,khoahoc.makhoahoc,lop.id_giaovien,giangvien.hoten FROM lop join khoa on lop.id_khoa=khoa.id join khoahoc on lop.id_khoahoc=khoahoc.id left join giangvien on lop.id_giaovien=giangvien.id";
    if (!empty($_REQUEST['malop'])&&!empty($_REQUEST['tenlop'])) {
        $sql.= " where malop LIKE '%".$_REQUEST['malop']."%' and tenlop LIKE '%".$_REQUEST['tenlop']."%'";
    }
    elseif (!empty($_REQUEST['malop'])) {
        $sql.= " where malop LIKE '%".$_REQUEST['malop']."%'";
    }
    elseif (!empty($_REQUEST['tenlop'])) {
        $sql.= " where tenlop LIKE '%".$_REQUEST['tenlop']."%'";
    }
    if (empty($_REQUEST['pagenum'])||$_REQUEST['pagenum']==1) {
    $sql.=' limit 12';
    }
    else
    {
    $page=(($_REQUEST['pagenum']-1)*20);
    $query.=' limit 20,'.$page;
    }
    $rows = $db->query($sql);
    $sql1 = "SELECT * FROM khoa";
    $rows1 = $db->query($sql1);
    $sql2 = "SELECT * FROM khoahoc";
    $rows2 = $db->query($sql2);
} else {
    header("location:index.php");
}
?>
    <div class="title text-center">
        <h3>Quản lý lớp</h3>
    </div>
    <form action="" method="get" accept-charset="utf-8">
        <input type="hidden" name="page" value="qllop">
        <div class="row">
            <div class="col-md-6">
                <label>Mã lớp:</label>
                <input type="text" class="form-control" name="malop" value="<?php echo @$_GET['malop'] ?>">
            </div>
            <div class="col-md-6">
                <label>Tên lớp:</label>
                <input type="text" class="form-control" name="tenlop" value="<?php echo @$_GET['tenlop'] ?>">
            </div>
            <div class="col-md-12">
                <input type="submit" name="timkiem"  value="Tìm kiếm" class="btn btn-primary" >
            </div>
        </div>
    </form>
    <br>
    <br>
    <h3>Danh sách lớp</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Ngành</th>
            <th>Khóa học</th>
            <th>Giáo viên chủ nhiệm</th>
        </tr>
        </thead>
        <tbody>
        <?php
        
        if (!empty($rows)) {
            $i = 0;
            foreach ($rows as $value) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value['malop'] ?></td>
                    <td><?php echo $value['tenlop'] ?></td>
                    <td><?php echo $value['tenkhoa'] ?></td>
                    <td><?php echo $value['makhoahoc'] ?></td>
                    <td><?php echo $value['hoten'] ?></td>
                    
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>
</div>
<div class="row text-center p_navigation">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $q = "select count(*) from lop";
                if (!empty($_REQUEST['malop'])&&!empty($_REQUEST['tenlop'])) {
                    $q.= " where malop LIKE '%".$_REQUEST['malop']."%' and tenlop LIKE '%".$_REQUEST['tenlop']."%'";
                }
                elseif (!empty($_REQUEST['malop'])) {
                    $q.= " where malop LIKE '%".$_REQUEST['malop']."%'";
                }
                elseif (!empty($_REQUEST['tenlop'])) {
                    $q.= " where tenlop LIKE '%".$_REQUEST['tenlop']."%'";
                }
                    
                     $rs = $db->query($q);
                      $tong = $rs->fetch()[0];  
                      $n=12;
                      $sotrang = ceil($tong/$n);
                      $page = (isset($_REQUEST['pagenum']))?$_REQUEST['pagenum']:1;
                       for($k=1;$k<=$sotrang;$k++)
                       {
                         $active = ($page==$k)?"class='active'":'';
                          echo "<li ".$active." ><a href='index.php?page=qlgiangvien&pagenum=".$k."&hoten=".@$_GET['hoten']."&email=".@$_GET['email']."'>$k</a></li>";
                       }
                ?>
                
            </ul>
        </nav>
    </div>