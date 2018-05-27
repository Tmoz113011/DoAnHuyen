<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
    $sql = "SELECT * FROM khoa";
    $rows = $db->query($sql);
    if (!empty($_REQUEST['submit'])) {
        $tenkhoa = $_REQUEST['tenkhoa'];
        $id = $_REQUEST['id'];
        if ($id == '') {
            $sql = "INSERT INTO `khoa`(`id`, `tenkhoa`) VALUES (NULL, '$tenkhoa')";
            $rowss = $db->query($sql);
            header("location:index.php?page=qlkhoa&mess=1");
        } else {
            $sql = "UPDATE `khoa` SET `tenkhoa`= '$tenkhoa' WHERE id = '$id'";
            $rowss = $db->query($sql);
            header("location:index.php?page=qlkhoa&mess=2");
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
        <h3>Quản lý khoa</h3>
    </div>
    <form action="" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" id='id' value="">
        <div class="row">
            <div class="col-md-5">
                <label>Tên khoa:</label>
                <input type="text" class="form-control" name="tenkhoa" id='tenkhoa' value="" required="">
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
    <h3>Danh sách khoa</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên khoa</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $i = 0;
        foreach ($rows as $value) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $value['tenkhoa'] ?></td>
                <td><a href="javascript:void(0)" class="btn btn-success"
                       onclick="edit('<?php echo $value['id'] ?>','<?php echo $value['tenkhoa'] ?>')" title=""><i
                                class="fa fa-edit"></i></a>
                    <a class="btn btn-danger"
                       href="index.php?page=xoakhoa&id=<?php echo $value['id'] ?>"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" title=""><i
                                class="fa fa-trash-o"></i></a></td>
            </tr>
            <?php
        }

        ?>

        </tbody>
    </table>
</div>
<script>
    function edit(id, name) {
        document.getElementById('id').value = id
        document.getElementById('tenkhoa').value = name
    }
</script>