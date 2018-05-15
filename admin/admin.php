<a href="index.php?page=addadmin" class='btn btn-success' title="">Thêm mới</a>
<h3>Danh sách Admin</h3>

<?php
$query = "select * from admin";
$rows=$db->query($query);
echo "<table class='table'>";
    echo "<tr>"
        . "<th>Họ tên</th>"
        . "<th>Email</th>"
        . "<th>Địa chỉ</th>"
        . "<th>Số điện thoại</th>"
        . "<th>Hành động</th>"
    . "</tr>";
    foreach($rows as $r)
    {     $confirm='return confirm("Bạn có muốn xóa không?")';
    echo "<tr>"
        . "<td>".$r['hoten']."</td>"
        . "<td>".$r['email']."</td>"
        . "<td>".$r['diachi']."</td>"
        . "<td>".$r['sdt']."</td>"
        ."<td><a href='index.php?page=editadmin&ma=$r[0]' title='Edit'><img src='../admin/css/images/edit.png' width='18px'/></a> "
        
        ."<a onclick='".$confirm."'  href='index.php?page=deladmin&ma=$r[0]' title='Delete'><img src='../admin/css/images/delete.png'width='18px'/></a></td>"
    . "</tr>";
    }
                    
echo "</table>";
?>