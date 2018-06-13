<?php 
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
if (!empty($_REQUEST['id'])) {
$query = "UPDATE `dky_sinhhoat` SET `trang_thai`=1 WHERE id=".$_REQUEST['id'];   
$save = $db->exec($query);
header('location:index.php?page=dangkysh');
}
}
 ?>