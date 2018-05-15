<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
        <link type="text/css" href="../cssjsadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../cssjsadmin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="../cssjsadmin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="../cssjsadmin/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
            if ($_SERVER["REQUEST_METHOD"]=='POST')
            {
		// lấy thông tin người dùng
		$username = $_POST["user"];
		$password = $_POST["pass"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = md5(addslashes($password));
		if ($username == "" || $password =="") 
                    {
			echo "<script>alert('Tên đăng nhập hoặc mật khẩu bạn không được để trống!')</script>";
                    }
                else
                    {
			$sql = "select * from admin where username ='$username' and password ='$password' ";
           
			$rows=$db->query($sql);
                        $rs = $rows->fetch();
			if (!empty($rs))
                            {
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                                $_SESSION['login_us']='ok';
				$_SESSION['username'] = $username;
                                // Thực thi hành động sau khi lưu thông tin vào session

                                header('Location: index.php');
                             }
                            else
                            {
                                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng !')</script>";
                            }
                            
                    }
                    }
?>
       

	<br>
	<br>
	<br>

	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
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
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>