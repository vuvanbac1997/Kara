<?php require_once('../model/khaibao_mb.php');?>
<?php
	$hd_ID = $_GET['hoadon_ID'];
	$sql="SELECT * FROM hoadon_sanpham WHERE hoadon_ID='$hd_ID'"; 
	$result = db_get_list($sql);
	$demid=0;
	echo "<table class='table table-striped table-bordered table-hover'>
				<tr>
				<td>ID</td>
				<td>Sản phẩm</td>
				<td>Số lượng</td>
				<td>Giá</td>
			";

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
			</tr>";
		
	}
	
?>