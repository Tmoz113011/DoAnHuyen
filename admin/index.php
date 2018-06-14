<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý giáo viên - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/css/style.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <style>
        .mt-2 {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<?php
include __DIR__ . '/header.php';

?>
<div class="container-fluid">
    <div class="row">
        <div>
            <?php
            include __DIR__ . "/connect.php";
            ?>
        </div>
        <div class="col-md-9">
            <?php
            //admin
            if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('1', $_SESSION['quyen'])) {
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "ctdkshl":
                            include "ctdkshl.php";
                            break;
                        case "qlgiangvien":
                            include "qlgiangvien.php";
                            break;
                        case "addgv":
                            include "addgv.php";
                            break;
                        case "suagv":
                            include "suagv.php";
                            break;
                        case "xoagv":
                            include "xoagv.php";
                            break;
                        case "pheduyet":
                            include "pheduyet.php";
                            break;
                        case 'ctbcthang';
                            include "ctbcthang.php";
                            break;
                        case 'ctbcky';
                            include "ctbcky.php";
                            break;
                        case "qlkhoa":
                            include "qlkhoa.php";
                            break;
                        case "baocaothang":
                            include "baocaothang.php";
                            break;
                        case "baocaoky":
                            include "baocaoky.php";
                            break;
                        case "dangkysh":
                            include "dangkysh.php";
                            break;
                        case "danhgia":
                            include "danhgia.php";
                            break;
                        case "xlcanbo":
                            include "xlcanbo.php";
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
                        case 'suaTK';
                            include "suaTK.php";
                            break;
                        default:
                            include "home.php";
                            break;

                    }

                } else include "home.php";
            } //giao viên
            elseif ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "del_bcthang":
                            include "del_bcthang.php";
                            break;
                        case "del_bcky":
                            include "del_bcky.php";
                            break;
                        case "del_dkshl":
                            include "del_dkshl.php";
                            break;
                        case "ctdkshl":
                            include "ctdkshl.php";
                            break;
                        case 'bcthang';
                            include "bcthang.php";
                            break;
                        case 'ctbcthang';
                            include "ctbcthang.php";
                            break;
                        case 'addbcthang';
                            include "addbcthang.php";
                            break;
                        case 'bcky';
                            include "bcky.php";
                            break;
                        case 'ctbcky';
                            include "ctbcky.php";
                            break;
                        case 'addbcky';
                            include "addbcky.php";
                            break;
                        case 'dkshl';
                            include "dkshl.php";
                            break;
//                        case 'dgxl';
//                            include "dgxl.php";
//                            break;
                        case 'xlcb';
                            include "xlcb.php";
                            break;
                        case 'suaTK';
                            include "suaTK.php";
                            break;
                        case 'logout';
                            include "logout.php";
                            break;
                        case 'ds_dkshl';
                            include "ds_dkshl.php";
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
                        case "ctdkshl":
                            include "ctdkshl.php";
                            break;
                        case "pheduyet":
                            include "pheduyet.php";
                            break;
                        case 'ctbcthang';
                            include "ctbcthang.php";
                            break;
                        case 'ctbcky';
                            include "ctbcky.php";
                            break;
                        case "qlkhoa":
                            include "qlkhoa.php";
                            break;
                        case "baocaothang":
                            include "baocaothang.php";
                            break;
                        case "baocaoky":
                            include "baocaoky.php";
                            break;
                        case "dangkysh":
                            include "dangkysh.php";
                            break;
                        case "danhgia":
                            include "danhgia.php";
                            break;
                        case "xlcanbo":
                            include "xlcanbo.php";
                            break;
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
</div>

<!--/.wrapper-->

<script src="../admin/css/ckeditor/ckeditor.js" type="text/javascript"></script>
</body>
</html>