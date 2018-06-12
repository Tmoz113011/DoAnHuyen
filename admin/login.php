<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý giáo viên - Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
<body>
<?php
session_start();
include "connect.php";
if (empty($_SESSION['login_us'])) {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if ($_POST['loai'] == 1) {
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
        } elseif ($_POST['loai'] == 2) {
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
                    $sqlLop = "select * from lop where id_giaovien=" . $rs['id'];
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
        } else {
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
    <div class="card card-container">
        <p id="profile-name" class="profile-name-card"> ĐĂNG NHẬP HỆ THỐNG</p>
        <img id="profile-img" class="profile-img-card" src="img/logo-utt-border.png"/>
        <form class="form-signin" action="" method="POST">
            <span id="reauth-email" class="reauth-email"></span>
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
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

</body>
</html>