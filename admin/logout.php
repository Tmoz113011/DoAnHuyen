<?php
    session_start();
     
    if(isset($_SESSION['login_us']))
    {
        unset($_SESSION['login_us']);
    }
    header("location:index.php");
?>