<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link type="text/css" href="../admin/css/css/style.css" rel="stylesheet">
    <link type="text/css" href="../admin/css/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include __DIR__ . '/header.php';

?>

<?php
session_start();
if (!isset($_SESSION['login_us'])) {
    header("location:login.php");
}
?>
<div class="container-fluid">
    <div class="row">
        <div>
            <?php
            include __DIR__ . "/connect.php";
            include __DIR__ . '/sidebar.php';
            ?>
        </div>
        <div class="col-md-9">
            <?php
            //admin
            if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "qlkhoa":
                            include "qlkhoa.php";
                            break;
                        case "qlnganh":
                            include "qlnganh.php";
                            break;
                        case "qllop":
                            include "qllop.php";
                            break;
                        case "qlkhoahoc":
                            include "qlkhoahoc.php";
                            break;
                        case "baocao":
                            include "baocao.php";
                            break;
                        case "xoakhoa":
                            include "xoakhoa.php";
                            break;
                        case "xoanganh":
                            include "xoanganh.php";
                            break;
                        case "xoalop":
                            include "xoalop.php";
                            break;
                        case "xoakhoahoc":
                            include "xoakhoahoc.php";
                            break;
                        case "nguoidung":
                            include "nguoidung.php";
                            break;
                        case "addadmin":
                            include "addadmin.php";
                            break;
                        case "themnd":
                            include "themnd.php";
                            break;
                        case "xoatv":
                            include "xoatv.php";
                            break;
                        case "deladmin":
                            include "deladmin.php";
                            break;
                        case "editadmin":
                            include "editadmin.php";
                            break;
                        case "suatv":
                            include "suatv.php";
                            break;
                        case 'logout';
                            include "logout.php";
                            break;
                        case 'order';
                            include "order.php";
                            break;
                        case 'nguoidung';
                            include "nguoidung.php";
                            break;
                        default:
                            include "home.php";
                            break;

                    }

                } else include "home.php";
            } //giao viên
            elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
                print_r($_SESSION['quyen']);
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {

                        case 'logout';
                            include "logout.php";
                            break;
                        default:
                            include "home.php";
                            break;

                    }

                } else include "home.php";
            } //thanhtra
            elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('3', $_SESSION['quyen'])) {
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {

                        case 'logout';
                            include "logout.php";
                            break;
                        default:
                            include "home.php";
                            break;

                    }

                } else include "home.php";
            }
            ?>


        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->

<script src="../admin/css/ckeditor/ckeditor.js" type="text/javascript"></script>
</body>
</html>