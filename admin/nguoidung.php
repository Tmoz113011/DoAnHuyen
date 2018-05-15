             <a href="index.php?page=themtv" title="" class='btn btn-success'>Thêm </a>
                        <h3>Danh sách thành viên</h3>
                       <?php
                            $query = "select * from nguoidung where trangthai=0 order by makh desc ";
                            $rows=$db->query($query);
                            echo "<table class='table'>";
                            echo "<tr>"
                                    . "<th>Họ tên</th>"
                                    . "<th>Email</th>"
                                    . "<th>Địa chỉ</th>"
                                    . "<th>Số điện thoại</th>"
                                    . "<th>Ngày tạo</th><th>Hành động</th>"
                                 . "</tr>";
                            foreach($rows as $r) 
                            {    $confirm='return confirm("Bạn có muốn xóa không?")';             
                                echo "<tr>"
                                        . "<td><a href='?page=orderkh&makh=".$r[0]."'>$r[4]</a></td>"
                                        . "<td>$r[3]</td>"
                                        . "<td>$r[5]</td>"
                                         . "<td>$r[6]</td>"
                                            . "<td>$r[8]</td>"
                                            ."<td><a href='index.php?page=suand&ma=$r[0]' title='Edit'><img src='../admin/css/images/edit.png' width='18px'/></a> "
                                        
                                        ."<a onclick='".$confirm."'  href='index.php?page=xoand&ma=$r[0]' title='Delete'><img src='../admin/css/images/delete.png'width='18px'/></a></td>"
                                            
                                     . "</tr>";

                            }
				
                            echo "</table>";

                            ?>
