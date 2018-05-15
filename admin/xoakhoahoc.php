<?php 
if (!empty($_REQUEST['id'])) {
	$id= $_REQUEST['id'];
	$sql = "DELETE FROM `khoahoc` WHERE id= '$id'";
	$rows = $db-> query($sql);
	header("location:index.php?page=qlkhoahoc&mess=3");
}
else
	header("location:index.php?page=qlkhoahoc&mess=-3");
 ?>