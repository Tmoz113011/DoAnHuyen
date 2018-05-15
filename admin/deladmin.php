<?php
     $ma=(int)$_REQUEST['ma'];
     $query= "delete from admin where id=$ma";
     $count=$db->exec($query);
     if($count>0)
         header("location:?page=admin");
?>

