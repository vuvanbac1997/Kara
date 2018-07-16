<?php require_once('../model/khaibao.php');?>
<?php
	$hd_ID = $_GET['hoadon_ID'];
	$sql="SELECT * FROM hoadon_sanpham WHERE hoadon_ID='$hd_ID'"; 
	$result = db_get_list($sql);
	$demid=0;
	echo "<table class='table table-striped table-bordered table-hover'>
			<thead>
				<tr>
				<td>ID</td>
				<td>Sản phẩm</td>
				<td>Số lượng</td>
				<td>Giá</td>
				<td>Sửa</td>
				<td>Xóa</td>
			</thead>";
		echo "<tbody>";
	for($i = 0; $i < count($result); $i++){
		$demid++;
		$id = htmlentities($result[$i]['sanpham_ID']);
		$sl = htmlentities($result[$i]['so_luong']) ;
		$gia = htmlentities($result[$i]['gia_san_pham']);
		$sql1="SELECT * FROM sanpham WHERE sanpham_ID='$id'";
		$result1 = db_get_row($sql1);
		$tensp = $result1['ten_san_pham'];
		echo "<tr  id='row".$demid."'>
				<td >$demid</td>
				<td id='ten".$id."'>$tensp</td>
				<td id='sl".$id."'>$sl</td>
				<td id='gia".$id."'>$gia</td>
				<td> <button id='".$id."' name='".$id."' class='btn btn-primary btn-circle edit'><i class='fa fa-exchange'></i></button>
					 <button id='save".$id."' name='".$id."' class='btn btn-primary btn-circle save' style='display:none;'><i class='fa fa-save'></i></button>
				</td>
				 
				<td> <button id='".$id."' name='".$id."' class='btn btn-danger btn-circle delete'><i class='fa fa-times'></i></button> </td>
			</tr>";
			echo "</tbody>";
	}
	
?>