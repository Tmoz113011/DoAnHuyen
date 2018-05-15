<?php
    session_start();
     
    if(isset($_SESSION['login_us']))
    {
        unset($_SESSION['login_us']);
        unset($_SESSION['username']);
        unset($_SESSION['quyen']);
    }
    header("location:index.php");
?>