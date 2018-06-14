<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = array(); //Khoi tao mang loi rong
// if(empty($_POST['tendangnhap']))
// {
//     $error[]='tendn';
// }
// else
// {
//     $tendn=$_POST['tendangnhap'];
//      $kt="select * from admin where username='$tendn'";
//      $kt1=$db->query($kt);
//      $kt2=$kt1->fetch();
// }
// if(isset($kt2) && $kt2>0)
// {
//     $error[]='trungten';
// }
        if (!empty($_POST['hoten'])) {
            $hoten = $_POST['hoten'];
        }
        if (!empty($_POST['diachi'])) {
            $diachi = $_POST['diachi'];
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (!empty($_POST['sdt'])) {
            $sdt = $_POST['sdt'];
        }
        if (!empty($_POST['chucvu'])) {
            $chucvu = $_POST['chucvu'];
        }
        if (!empty($_POST['hocvi'])) {
            $hocvi = $_POST['hocvi'];
        }
        if (!empty($_POST['noicongtac'])) {
            $noicongtac = $_POST['noicongtac'];
        }
        $query = "update giangvien set hoten='$hoten', diachi='$diachi', email='$email', sdt='$sdt', chucvu='$chucvu',noicongtac='$noicongtac',hocvi='$hocvi' where id=" . (int)$_POST['ma'];
        $count = $db->exec($query);
        if ($count > 0) {
            echo "<script>"
                . "if(alert('Cập nhật thành viên thành công')==true)"
                . "{"
                . "window.location='admin/index.php?page=qlgiangvien'"
                . "}</script>";
        } else
            echo "<script>"
                . "if(alert('Thất bại')==true)"
                . "</script>";
    }
} else {
    header("location:index.php");
}

?>
<form action="" method="post">
    <fieldset>
        <!-- <div class="control-group">
            <label class="control-label tieude">Tên đăng nhập:</label>
            <div class="controls">
                <input type="text" class="form-control" name="tendangnhap" required="">
            </div>
        </div>   -->
        <input type="hidden" name="ma" value="<?php echo (int)$_REQUEST['ma'] ?>">
        <div class="control-group">
            <label class="control-label tieude">Họ và tên:</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $hoten ?>" name="hoten" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Địa chỉ:</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $diachi ?>" name="diachi" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Email:</label>
            <div class="controls">
                <input type="email" class="form-control" value="<?php echo $email ?>" name="email" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Số điện thoại</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $sdt ?>" name="sdt" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Chức vụ</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $chucvu ?>" name="chucvu" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Học vị</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $hocvi ?>" name="hocvi" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label tieude">Nơi công tác</label>
            <div class="controls">
                <input type="text" class="form-control" value="<?php echo $noicongtac ?>" name="noicongtac" required="">
            </div>
        </div>
        
        <button type="submit" class="single_add_to_cart_button button alt">Lưu</button>
</form>
</div>