<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
    $sql = "SELECT * FROM khoahoc ";
    $rows = $db->query($sql);
    $sql1 = "SELECT * FROM khoa";
    $rows1 = $db->query($sql1);
    if (!empty($_REQUEST['submit'])) {
        $makhoahoc = $_REQUEST['makhoahoc'];
        $tenkhoahoc = $_REQUEST['tenkhoahoc'];
        $id = $_REQUEST['id'];
        if ($id == '') {
            $sql = "INSERT INTO `khoahoc`(`id`, `makhoahoc`, `tenkhoahoc`) VALUES (NULL, '$makhoahoc', '$tenkhoahoc')";
            $rowss = $db->query($sql);
            header("location:index.php?page=qlkhoahoc&mess=1");
        } else {
            $sql = "UPDATE `khoahoc` SET `makhoahoc`= '$makhoahoc' `tenkhoahoc`= '$tenkhoahoc' WHERE id = '$id'";
            $rowss = $db->query($sql);
            header("location:index.php?page=qlkhoahoc&mess=2");
            echo "1";
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
<div class="container">
    <div class="title text-center">
        <h3>Quản lý khóa học</h3>
    </div>
    <form action="" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" id='id' value="">
        <div class="row">
            <div class="col-md-5">
                <label>Mã khóa học:</label>
                <input type="text" class="form-control" name="makhoahoc" id='makhoahoc' value="" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Tên khóa học:</label>
                <input type="text" class="form-control" name="tenkhoahoc" id='tenkhoahoc' value="" required="">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <input type="submit" class="btn btn-success" name="submit" value="Lưu">
            </div>
        </div>

    </form>
    <br>
    <br>
    <h3>Danh sách khóa học</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã khóa học</th>
            <th>Tên khóa học</th>
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
                    <td><?php echo $value['makhoahoc'] ?></td>
                    <td><?php echo $value['tenkhoahoc'] ?></td>
                    <td><a href="javascript:void(0)"
                           onclick="edit('<?php echo $value['id'] ?>','<?php echo $value['tenkhoahoc'] ?>','<?php echo $value['makhoahoc'] ?>')"
                           title="">Sửa</a> | <a href="index.php?page=xoakhoahoc&id=<?php echo $value['id'] ?>"
                                                 onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                 title="">Xóa</a></td>
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>
</div>
<script>
    function edit(id, name, makhoahoc) {
        document.getElementById('id').value = id
        document.getElementById('tenkhoahoc').value = name
        document.getElementById('makhoahoc').value = makhoahoc
    }
</script>