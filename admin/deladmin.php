<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
    $ma = (int)$_REQUEST['ma'];
    $query = "delete from users where id=$ma";
    $count = $db->exec($query);
    if ($count > 0)
        header("location:?page=nguoidung");
} else {
    header("location:index.php");
}

?>

