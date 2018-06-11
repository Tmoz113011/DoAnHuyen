<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link type="text/css" href="../cssjsadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../cssjsadmin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../cssjsadmin/css/theme.css" rel="stylesheet">
    <link type="text/css" href="../cssjsadmin/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
include "connect.php";
if (empty($_SESSION['login_us'])) {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if ($_POST['loai']==1) {
        $username = $_POST["user"];
        $password = $_POST["pass"];
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = md5(addslashes($password));
        if ($username == "" || $password == "") {
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu bạn không được để trống!')</script>";
        } else {
            $sql = "select * from users where username ='$username' and password ='$password' ";
            $rows = $db->query($sql);
            $rs = $rows->fetch();
            $quyen = explode(',', $rs['quyen']);
            if (!empty($rs)) {
                $_SESSION['login_us'] = 'ok';
                $_SESSION['username'] = $username;
                $_SESSION['quyen'] = $quyen;
                if (!empty($_SESSION['login_us'])) {
                    header('Location: index.php');
                }
            } else {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng !')</script>";
            }
        }
        }
        elseif ($_POST['loai']==2) {
        $username = $_POST["user"];
        $password = $_POST["pass"];
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = md5(addslashes($password));
        if ($username == "" || $password == "") {
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu bạn không được để trống!')</script>";
        } else {
            $sql = "select * from users where username ='$username' and password ='$password' ";
            $rows = $db->query($sql);
            $rs = $rows->fetch();
            $quyen = explode(',', $rs['quyen']);
            if (!empty($rs)) {
                $sqlLop = "select * from lop where id_giaovien=".$rs['id'];
                $rowsLop = $db->query($sqlLop);
                $rsLop = $rowsLop->fetch();
                $_SESSION['lop'] = $rsLop;
                $_SESSION['login_us'] = 'ok';
                $_SESSION['username'] = $username;
                $_SESSION['quyen'] = $quyen;
                if (!empty($_SESSION['login_us'])) {
                    header('Location: index.php');
                }
            } else {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng !')</script>";
            }
        }
        }
        else
        {
        $username = $_POST["user"];
        $password = $_POST["pass"];
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = md5(addslashes($password));
        if ($username == "" || $password == "") {
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu bạn không được để trống!')</script>";
        } else {
            $sql = "select * from thanhtra where username ='$username' and password ='$password' ";
            $rows = $db->query($sql);
            $rs = $rows->fetch();
            $quyen = explode(',', $rs['quyen']);
            if (!empty($rs)) {
                $_SESSION['login_us'] = 'ok';
                $_SESSION['username'] = $username;
                $_SESSION['quyen'] = $quyen;
                if (!empty($_SESSION['login_us'])) {
                    header('Location: index.php');
                }
            } else {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng !')</script>";
            }
        }
        }
    }
} else {
    header("location:index.php");
}

?>

<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tài khoản" name="user" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input placeholder="" name="loai" type="radio" value="1" required="">Admin
                                <input placeholder="" name="loai" type="radio" value="2" required>Giảng viên
                                <input placeholder="" name="loai" type="radio" value="3" required>Thanh tra
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Đăng nhập</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>