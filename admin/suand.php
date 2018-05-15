 
<?php
            $que = "select * from nguoidung where mand=".(int)$_REQUEST['ma'];
                            $rows=$db->query($que);
                            foreach ($rows as $key => $value) {
                                $hoten=$value[4];
                                $diachi=$value['diachi'];
                                $email=$value['email'];
                                $sdt=$value['sdt'];
                            }          
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $error = array();
                if(!empty($_POST['hoten']))
                {
                    $hoten=$_POST['hoten']; 
                }
                if(!empty($_POST['diachi']))
                {
                    $diachi=$_POST['diachi']; 
                }
                 if(!empty($_POST['email']))
                {
                    $email=$_POST['email'];
                }
                if(!empty($_POST['sdt']))
                {
                    $sdt=$_POST['sdt']; 
                }

                    $query = "update nguoidung set hoten='$hoten', diachi='$diachi', email='$email', sdt='$sdt' where mand=".(int)$_POST['ma'];

                    //Thuc thi cau truy van
                    $count=$db->exec($query);
                    if($count>0)
                    {
                       echo "<script>"
                        . "if(confirm('Cập nhật thành viên thành công')==true)"
                            . "{"
                               . "window.location='index.php?page=thanhvien'"
                               . "}</script>"     ;                      
                    }
                    else
                        echo "<script>"
                        . "if(confirm('Thất bại')==true)"
                            . "</script>"     ; 
            }
        ?>
<div class="span9">
    <form action="" method="post">
                        <fieldset>
                            <!-- <div class="control-group">
                                <label class="control-label tieude">Tên đăng nhập:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="tendangnhap" required="">
                                        </div>
                                </div>   --> 
                                <input type="hidden" name="ma" value="<?php echo (int)$_REQUEST['ma'] ?>">
                            <div class="control-group">
                                    <label class="control-label tieude">Họ và tên:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="<?php echo $hoten ?>" name="hoten" required="">
                                        </div>
                                </div>   
                                <div class="control-group">
                                    <label class="control-label tieude">Địa chỉ:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="<?php echo $diachi ?>"  name="diachi" required="">
                                        </div>
                                </div>   
                                <div class="control-group">
                                    <label class="control-label tieude">Email:</label>
                                        <div class="controls">
                                            <input type="email" class="form-control" value="<?php echo $email ?>"  name="email" required="">
                                        </div>
                                </div> 
                                   <div class="control-group">
                                    <label class="control-label tieude">Số điện thoại</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="<?php echo $sdt ?>"  name="sdt" required="">
                                        </div>
                                </div>   
                             <button type="submit" class="single_add_to_cart_button button alt">Lưu</button>
                    </form>
</div>