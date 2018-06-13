<?php
session_start();

if (isset($_SESSION['login_us'])) {
    unset($_SESSION['login_us']);
    unset($_SESSION['username']);
    unset($_SESSION['quyen']);
    if (!empty($_SESSION['lop'])) {
    	unset($_SESSION['lop']);
    }
}
header("location:index.php");
?>