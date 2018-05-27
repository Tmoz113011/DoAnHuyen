<?php
if (!empty($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `lop` WHERE id= '$id'";
    $rows = $db->query($sql);
    header("location:index.php?page=qllop&mess=3");
} else
    header("location:index.php?page=qllop&mess=-3");
?>