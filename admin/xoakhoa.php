<?php 
if (!empty($_REQUEST['id'])) {
	$id= $_REQUEST['id'];
	$sql = "DELETE FROM `khoa` WHERE id= '$id'";
	$rows = $db-> query($sql);
	header("location:index.php?page=qlkhoa&mess=3");
}
else
	header("location:index.php?page=qlkhoa&mess=-3");
 ?>