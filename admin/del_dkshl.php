<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
    if (!empty($_REQUEST['id'])) {
        $query= "delete from dky_sinhhoat where id=".$_REQUEST['id'];
     $count=$db->exec($query);
     if($count>0)
         header("location:?page=ds_dkshl");
    }
    } else {
    header("location:index.php");
} ?>