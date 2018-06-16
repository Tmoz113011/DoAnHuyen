<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
    $que = "select * from giangvien where id=" . (int)$_REQUEST['ma'];
    $rows = $db->query($que);
    foreach ($rows as $key => $value) {
        $hoten = $value[4];
        $diachi = $value['diachi'];
        $email = $value['email'];
        $sdt = $value['sdt'];
        $quyen = $value['quyen'];
        $chucvu = $value['chucvu'];
        $hocvi = $value['hocvi'];
        $noicongtac = $value['noicongtac'];
    }
} else {
    header("location:index.php");
}

?>
<br>
<form action="" method="post" >
    <fieldset class="col-md-5">
        <div class="control-group">
            <label class="control-label tieude">Họ và tên:</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $hoten ?>" name="hoten" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Địa chỉ:</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $diachi ?>" name="diachi" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Email:</label>
            <div class="controls">
                <input type="email" class="form-control" value="<?php echo $email ?>" name="email" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Số điện thoại</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $sdt ?>" name="sdt" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Chức vụ</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $chucvu ?>" name="chucvu" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Học vị</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $hocvi ?>" name="hocvi" disabled>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Nơi công tác</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $noicongtac ?>" name="noicongtac" disabled>
            </div>
        </div>
</form>
</div>