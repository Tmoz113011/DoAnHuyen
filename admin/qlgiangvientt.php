<div class="title text-center">
        <h3>Quản lý người dùng</h3>
    </div>
<form action="" method="get" accept-charset="utf-8">
    <input type="hidden" name="page" value="qlgiangvien">
    <div class="row">
        <div class="col-md-6">
            <label>Họ tên</label>
            <input type="" name="hoten" class="form-control" value="<?php echo @$_GET['hoten'] ?>">
        </div>
        <div class="col-md-6">
            <label>Email</label>
            <input type="" name="email" class="form-control" value="<?php echo @$_GET['email'] ?>">
        </div>
        <div class="col-md-6">
            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
        </div>
    </div>
</form>
<h3>Danh sách giảng viên</h3>

<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
    $query = "select * from giangvien";
    if (!empty($_REQUEST['hoten'])&&!empty($_REQUEST['email'])) {
        $query.= " where hoten LIKE '%".$_REQUEST['hoten']."%' and email LIKE '%".$_REQUEST['email']."%'";
    }
    elseif (!empty($_REQUEST['hoten'])) {
        $query.= " where hoten LIKE '%".$_REQUEST['hoten']."%'";
    }
    elseif (!empty($_REQUEST['email'])) {
        $query.= " where email LIKE '%".$_REQUEST['email']."%'";
    }
    if (empty($_REQUEST['pagenum'])||$_REQUEST['pagenum']==1) {
    $query.=' limit 12';
    }
    else
    {
    $page=(($_REQUEST['pagenum']-1)*20);
    $query.=' limit 20,'.$page;
    }
    $rows = $db->query($query);
    echo "<table class='table'>";
    echo "<tr>"
        . "<th>Họ tên</th>"
        . "<th>Email</th>"
        . "<th>Địa chỉ</th>"
        . "<th>Số điện thoại</th>"
        . "<th>Hành động</th>"
        . "</tr>";
    if (!empty($rows)) {
        foreach ($rows as $r) {
            $confirm = 'return confirm("Bạn có muốn xóa không?")';
            echo "<tr>"
                . "<td>" . $r['hoten'] . "</td>"
                . "<td>" . $r['email'] . "</td>"
                . "<td>" . $r['diachi'] . "</td>"
                . "<td>" . $r['sdt'] . "</td>"
                . "<td><a href='index.php?page=viewgv&ma=$r[0]' title='Edit' class='btn btn-primary'><i class='fa fa-eye'></i></a> "

                . "</td>"
                . "</tr>";
        }
    }

    echo "</table>";
    ?>
    <div class="row text-center p_navigation">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $q = "select count(*) from giangvien";
                if (!empty($_REQUEST['hoten'])&&!empty($_REQUEST['email'])) {
                    $query.= " where hoten LIKE '%".$_REQUEST['hoten']."%' and email LIKE '%".$_REQUEST['email']."%'";
                }
                elseif (!empty($_REQUEST['hoten'])) {
                    $query.= " where hoten LIKE '%".$_REQUEST['hoten']."%'";
                }
                elseif (!empty($_REQUEST['email'])) {
                    $query.= " where email LIKE '%".$_REQUEST['email']."%'";
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
    <?php
} else {
    header("location:index.php");
}

?>