 
<?php
                      
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
               
                $error = array(); //Khoi tao mang loi rong
                if(empty($_POST['tendangnhap']))
                {
                    $error[]='tendn';
                }
                else
                {
                    $tendn=$_POST['tendangnhap'];
                     $kt="select * from admin where username='$tendn'";
                     $kt1=$db->query($kt);
                     $kt2=$kt1->fetch();
                }
                if(isset($kt2) && $kt2>0)
                {
                    $error[]='trungten';
                }
                if(empty($_POST['matkhau']))
                {
                    $error[]='matkhau';
                }
                else
                {
                    $matkhau=md5($_POST['matkhau']); 
                }
                if(empty($_POST['hoten']))
                {
                    $error[]='hoten';
                }
                else
                {
                    $hoten=$_POST['hoten']; 
                }
                if(empty($_POST['diachi']))
                {
                    $error[]='diachi';
                }
                else
                {
                    $diachi=$_POST['diachi']; 
                }
                 if(empty($_POST['email']))
                {
                    $error[]='email';
                }
                else
                {
                    $email=$_POST['email'];
                }
                if(empty($_POST['sdt']))
                {
                    $error[]='sdt';
                }
                else
                {
                    $sdt=$_POST['sdt']; 
                }            
                    $query = "insert into admin(username, password, hoten ,diachi , email, sdt, ngaytao) values('$tendn', '$matkhau', '$hoten', '$diachi', '$email', '$sdt', now())";  
                    $count=$db->exec($query);
                    if($count>0)
                    {
                       // header("location:?page=login");
                       echo "<script>"
                        . "if(confirm('Đăng ký thành viên thành công')==true)"
                            . "{"
                               . "window.location='index.php?page=admin'"
                               . "}</script>"     ;                      
                    }
            }
        ?>
<div class="span9">
    <form action="" method="post">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label tieude">Tên đăng nhập:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="tendangnhap" required="">
                                        </div>
                                </div>  
                         <div class="control-group">
                                    <label class="control-label tieude">Mật khẩu:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control" name="matkhau" required="">
                                        </div>
                                </div>   
                            <div class="control-group">
                                    <label class="control-label tieude">Họ và tên:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="hoten" required="">
                                        </div>
                                </div>   
                                <div class="control-group">
                                    <label class="control-label tieude">Địa chỉ:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="diachi" required="">
                                        </div>
                                </div>   
                                <div class="control-group">
                                    <label class="control-label tieude">Email:</label>
                                        <div class="controls">
                                            <input type="email" class="form-control" name="email" required="">
                                        </div>
                                </div> 
                                   <div class="control-group">
                                    <label class="control-label tieude">Số điện thoại</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="sdt" required="">
                                        </div>
                                </div>   
                             <button type="submit" class="btn btn-success">Lưu</button>
                    </form>
</div>