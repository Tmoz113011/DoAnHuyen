<?php
if($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&in_array('1', $_SESSION['quyen']))
{
	$sqlgv= "SELECT `id`, `username`, `password`, `hoten`, `diachi`, `email`, `sdt`, `ngaytao`, `quyen` FROM `users` WHERE quyen LIKE '%2%'";
	$rowgv = $db -> query($sqlgv);
	$sql = "SELECT lop.id,lop.tenlop,lop.malop,nganh.tennganh,nganh.id,khoahoc.id,khoahoc.tenkhoahoc,khoahoc.makhoahoc,lop.id_giaovien FROM lop join nganh on lop.id_nganh=nganh.id join khoahoc on lop.id_khoahoc=khoahoc.id";
	$rows = $db -> query($sql);
	$sql1 = "SELECT * FROM nganh";
	$rows1 = $db -> query($sql1);
	$sql2 = "SELECT * FROM khoahoc";
	$rows2 = $db -> query($sql2);
	if (!empty($_REQUEST['submit'])) {
		$malop = $_REQUEST['malop'];
		$tenlop = $_REQUEST['tenlop'];
		$id_nganh = (!empty($_REQUEST['id_nganh'])?$_REQUEST['id_nganh']:0);;
		$id_khoahoc = (!empty($_REQUEST['id_khoahoc'])?$_REQUEST['id_khoahoc']:0);;
		$id = $_REQUEST['id'];
		$id_giaovien = (!empty($_REQUEST['id_giaovien'])?$_REQUEST['id_giaovien']:0);
		if ($id=='') {
			$sql = "INSERT INTO `lop`(`id`, `tenlop`, `malop`, `id_nganh`, `id_khoahoc`, `id_giaovien`) VALUES (NULL, '$tenlop', '$malop', '$id_nganh', '$id_khoahoc', '$id_giaovien')";
			$rowss = $db->query($sql);
			header("location:index.php?page=qllop&mess=1");
		}
		else
		{
			$sql = "UPDATE `lop` SET `malop`='$malop',`tenlop`='$tenlop',`id_nganh`=$id_nganh,`id_khoahoc`=$id_khoahoc,`id_giaovien`=$id_giaovien WHERE id = '$id'";
			$rowss = $db->query($sql);
			header("location:index.php?page=qllop&mess=2");
		}
	}
}
else
{header("location:index.php");}
?>
<script>
var mess="<?php echo $_REQUEST['mess']?>";
switch (mess) {
case '1':
alert("Thêm mới thành công");
break;

case '2':
alert("Cập nhật thành công");
break;

case '3':
alert("Xóa thành công");
break;

case '-3':
alert("Xóa thất bại");
break;

default:

break;
}
</script>
<form action="" method="post" accept-charset="utf-8">
	<input type="hidden" name="id" id='id' value="">
	<div class="row">
		<div class="col-md-5">
			<label>Mã lớp:</label>
			<input type="text" class="form-control" name="malop" id='malop' value="" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Tên lớp:</label>
			<input type="text" class="form-control" name="tenlop" id='tenlop' value="" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Khóa học:</label>
			<select name="id_khoahoc" id="id_khoahoc" class="form-control">
				<option value="">Chọn khóa học</option>
				<?php foreach ($rows2 as $value) { ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['tenkhoahoc'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Ngành:</label>
			<select name="id_nganh" id="id_nganh" class="form-control">
				<option value="">Chọn ngành</option>
				<?php foreach ($rows1 as $value) { ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['tennganh'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Giáo viên chủ nhiệm:</label>
			<select name="id_giaovien" id="id_giaovien" class="form-control">
				<option value="0">Chọn giáo viên</option>
				<?php foreach ($rowgv as $value) { ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['hoten'].' - '. $value['email']?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-5">
			<input type="submit" class="btn btn-success" name="submit" value="Lưu">
		</div>
	</div>
	
</form>
<br>
<br>
<h3>Danh sách ngành</h3>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã lớp</th>
			<th>Tên lớp</th>
			<th>Ngành</th>
			<th>Khóa học</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if (!empty($rows)) {
			$i=0;
			foreach ($rows as $value) {
			$i++;
		?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $value['malop'] ?></td>
			<td><?php echo $value['tenlop'] ?></td>
			<td><?php echo $value['tennganh'] ?></td>
			<td><?php echo $value['makhoahoc'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit('<?php echo $value[0] ?>','<?php echo $value['malop'] ?>','<?php echo $value['tenlop'] ?>','<?php echo $value[4]?>','<?php echo $value[5] ?>','<?php echo $value[8] ?>')" title="">Sửa</a> | <a href="index.php?page=xoalop&id=<?php echo $value['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" title="">Xóa</a></td>
		</tr>
		<?php
		}
		}
		?>
		
	</tbody>
</table>
<script>
	function edit(id,code,name,id_nganh,id_khoahoc,id_giaovien)
	{
document.getElementById('id').value = id
document.getElementById('malop').value = code
document.getElementById('tenlop').value = name
document.getElementById('id_nganh').value = id_nganh
document.getElementById('id_khoahoc').value = id_khoahoc
document.getElementById('id_giaovien').value = id_giaovien
	}
</script>