<?php
     $ma=(int)$_REQUEST['ma'];
     $query= "delete from nguoidung where makh=$ma";
     $count=$db->exec($query);
     if($count>0)
         header("location:?page=thanhvien");
?>

