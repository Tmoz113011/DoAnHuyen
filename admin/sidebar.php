<div class="col-md-3">
	<?php
	//admin
	if($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&$_SESSION['quyen']==1)
	{ ?>
	<ul class="widget widget-menu unstyled">
		<li><a href="index.php?page=qlkhoa"><i class="fa fa-list-alt"></i> Quản lý khoa</a></li>
		<li><a href="index.php?page=qlnganh"><i class="fa fa-list-alt"></i> Quản lý ngành</a></li>
		<li><a href="index.php?page=qllop"><i class="fa fa-list-alt"></i> Quản lý lớp</a></li>
		<li><a href="index.php?page=qlkhoahoc"><i class="fa fa-list-alt"></i> Quản lý khóa học</a></li>
		<li><a href="index.php?page=baocao"><i class="fa fa-list-alt"></i> Báo cáo</a></li>
		<li><a href="index.php?page=thanhvien"><i class="fa fa-address-card-o"></i> Quản lý người dùng</a></li>
		<li><a href="index.php?page=admin"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
		<li><a href="index.php?page=logout"><i class="  glyphicon glyphicon-log-out"></i> Thoát </a></li>
	</ul>
	<?php }
	//giao viên
	elseif ($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&$_SESSION['quyen']==2) {
	if(isset($_REQUEST['page']))
	{
	
	}
}
	//thanhtra
	elseif ($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&$_SESSION['quyen']==2) {
	if(isset($_REQUEST['page']))
	{
	
	}
}
	?>
	
</div>