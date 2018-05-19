<?php
if($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&in_array('1', $_SESSION['quyen']))
{
	$sql = "SELECT nganh.id,nganh.tennganh,khoa.tenkhoa,khoa.id FROM nganh join khoa on nganh.id_khoa=khoa.id";
	$rows = $db -> query($sql);
	$sql1 = "SELECT * FROM khoa";
	$rows1 = $db -> query($sql1);
	if (!empty($_REQUEST['submit'])) {
		$tennganh = $_REQUEST['tennganh'];
		$id_khoa = $_REQUEST['id_khoa'];
		$id = $_REQUEST['id'];
		if ($id=='') {
			$sql = "INSERT INTO `nganh`(`id`, `tennganh`, `id_khoa`) VALUES (NULL, '$tennganh', '$id_khoa')";
			$rowss = $db->query($sql);
			header("location:index.php?page=qlnganh&mess=1");
		}
		else
		{
			$sql = "UPDATE `nganh` SET `tennganh`= '$tennganh' `id_khoa`= '$id_khoa' WHERE id = '$id'";
			$rowss = $db->query($sql);
			header("location:index.php?page=qlnganh&mess=2");
			echo "1";
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
			<label>Tên ngành:</label>
			<input type="text" class="form-control" name="tennganh" id='tennganh' value="" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Chọn khoa:</label>
			<select name="id_khoa" id="id_khoa" class="form-control">
				<option value="">Chọn khoa</option>
				<?php foreach ($rows1 as $value) { ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['tenkhoa'] ?></option>
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
			<th>Tên ngành</th>
			<th>Khoa</th>
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
			<td><?php echo $value['tennganh'] ?></td>
			<td><?php echo $value['tenkhoa'] ?></td>
			<td><a href="javascript:void(0)" onclick="edit('<?php echo $value[0] ?>','<?php echo $value['tennganh'] ?>','<?php echo $value[3] ?>')" title="">Sửa</a> | <a href="index.php?page=xoanganh&id=<?php echo $value['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" title="">Xóa</a></td>
		</tr>
		<?php
		}
		}
		?>
		
	</tbody>
</table>
<script>
	function edit(id,name,id_khoa)
	{
document.getElementById('id').value = id
document.getElementById('tennganh').value = name
document.getElementById('id_khoa').value = id_khoa
	}
</script>