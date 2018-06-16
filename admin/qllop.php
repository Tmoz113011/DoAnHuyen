<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
    $sqlgv = "SELECT `id`, `username`, `password`, `hoten`, `diachi`, `email`, `sdt`, `ngaytao`, `quyen` FROM `giangvien` WHERE quyen=2";
    $rowgv = $db->query($sqlgv);
    $sql = "SELECT lop.id,lop.tenlop,lop.malop,khoa.tenkhoa,khoa.id,khoahoc.id,khoahoc.tenkhoahoc,khoahoc.makhoahoc,lop.id_giaovien,giangvien.hoten FROM lop join khoa on lop.id_khoa=khoa.id join khoahoc on lop.id_khoahoc=khoahoc.id leftjoin giangvien on lop.id_giaovien=giangvien.id";
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
    if (!empty($_REQUEST['submit'])) {
        $malop = $_REQUEST['malop'];
        $tenlop = $_REQUEST['tenlop'];
        $id_khoa = (!empty($_REQUEST['id_khoa']) ? $_REQUEST['id_khoa'] : 0);;
        $id_khoahoc = (!empty($_REQUEST['id_khoahoc']) ? $_REQUEST['id_khoahoc'] : 0);;
        $id = $_REQUEST['id'];
        $id_giaovien = (!empty($_REQUEST['id_giaovien']) ? $_REQUEST['id_giaovien'] : 0);
        if ($id == '') {
            $sql = "INSERT INTO `lop`(`id`, `tenlop`, `malop`, `id_khoa`, `id_khoahoc`, `id_giaovien`) VALUES (NULL, '$tenlop', '$malop', '$id_khoa', '$id_khoahoc', '$id_giaovien')";
            $rowss = $db->query($sql);
            header("location:index.php?page=qllop&mess=1");
        } else {
            $sql = "UPDATE `lop` SET `malop`='$malop',`tenlop`='$tenlop',`id_khoa`=$id_khoa,`id_khoahoc`=$id_khoahoc,`id_giaovien`=$id_giaovien WHERE id = '$id'";
            $rowss = $db->query($sql);
            header("location:index.php?page=qllop&mess=2");
        }
    }
} else {
    header("location:index.php");
}
?>
<script>
    var mess = "<?php echo $_REQUEST['mess']?>";
    switch (mess) {
        case '1':
            alert("Thêm mới thành công");
            break;

        case '2':
            alert("Cập nhật thành công");
            break;

        case '3':
            alert("Xóa thành công");
            break;

        case '-3':
            alert("Xóa thất bại");
            break;

        default:

            break;
    }
</script>
    <div class="title text-center">
        <h3>Quản lý lớp</h3>
    </div>
    <form action="" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" id='id' value="">
        <div class="row">
            <div class="col-md-5">
                <label>Mã lớp:</label>
                <input type="text" class="form-control" name="malop" id='malop' value="" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Tên lớp:</label>
                <input type="text" class="form-control" name="tenlop" id='tenlop' value="" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Khóa học:</label>
                <select name="id_khoahoc" id="id_khoahoc" class="form-control" required="">
                    <option value="">Chọn khóa học</option>
                    <?php foreach ($rows2 as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['tenkhoahoc'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Ngành:</label>
                <select name="id_khoa" id="id_khoa" class="form-control" required="">
                    <option value="">Chọn ngành</option>
                    <?php foreach ($rows1 as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['tenkhoa'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Giáo viên chủ nhiệm:</label>
                <select name="id_giaovien" id="id_giaovien" class="form-control" required="">
                    <option value="0">Chọn giáo viên</option>
                    <?php foreach ($rowgv as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['hoten'] . ' - ' . $value['email'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <input type="submit" class="btn btn-success" name="submit" value="Lưu">
            </div>
        </div>

    </form>
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
            <th>Hành động</th>
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
                    <td><a href="javascript:void(0)" class="btn btn-success"
                           onclick="edit('<?php echo $value[0] ?>','<?php echo $value['malop'] ?>','<?php echo $value['tenlop'] ?>','<?php echo $value[4] ?>','<?php echo $value[5] ?>','<?php echo $value[8] ?>')"
                           title=""><i class="fa fa-edit"></i></a> <a
                                href="index.php?page=xoalop&id=<?php echo $value['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                title=""><i class="fa fa-trash-o"></i></a></td>
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
                          echo "<li ".$active." ><a href='index.php?page=qlgiangvien&pagenum=".$k."&malop=".@$_GET['malop']."&tenlop=".@$_GET['tenlop']."'>$k</a></li>";
                       }
                ?>
                
            </ul>
        </nav>
    </div>
<script>
    function edit(id, code, name, id_khoa, id_khoahoc, id_giaovien) {
        document.getElementById('id').value = id
        document.getElementById('malop').value = code
        document.getElementById('tenlop').value = name
        document.getElementById('id_khoa').value = id_khoa
        document.getElementById('id_khoahoc').value = id_khoahoc
        document.getElementById('id_giaovien').value = id_giaovien
    }
</script>