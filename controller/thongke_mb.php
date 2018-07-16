<?php 
	$idkh = $result['khachhang_ID'];
	$sql = "SELECT COUNT(*) AS num FROM hoadon WHERE khachhang_ID='$idkh'";
	$result =db_get_row($sql);
	echo '<tr>';
	echo '<th>Số lần mua hàng: </th>';
	echo '<td>'. $result['num'].'</td>';
	echo '</tr>';
	$sql = "SELECT * FROM hoadon WHERE khachhang_ID='$idkh'";
	$result =db_get_list($sql);
	$tien=0;
	for ($i=0; $i<count($result); $i++){
		$idhd = $result[$i]['hoadon_ID'];
		
		$sql1 = "SELECT SUM(gia_san_pham) AS sum FROM hoadon_sanpham WHERE hoadon_ID='$idhd'";
		$result1 = db_get_row($sql1);
		$tien += $result1['sum']; 
	}
	echo '<tr>';
	echo '<th>Số tiền đã chi </th>';
	echo '<td>'. $tien.' VND </td>';
	echo '</tr>';
 ?>