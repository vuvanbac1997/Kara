<?php 
	$sql="SELECT * FROM khachhang WHERE Email='$ekh'";
    $result = db_get_row($sql);
	$idkh = $result['khachhang_ID'];
	$sql = "SELECT * FROM hoadon WHERE khachhang_ID='$idkh'";
	$result =db_get_list($sql);
	
	// id hoá đơn lần mua cuối
	$idhd =$result[count($result)-1]['hoadon_ID'];
	
	$sql = "SELECT SUM(so_luong) AS sum FROM hoadon_sanpham WHERE hoadon_ID='$idhd'";
	$result =db_get_row($sql);
	echo '<tr>';
	echo '<th>Số sản phẩm đã mua</th>';
	echo '<td>'. $result['sum'].' sản phẩm </td>';
	echo '</tr>';
	
	$sql = "SELECT SUM(gia_san_pham) AS sum FROM hoadon_sanpham WHERE hoadon_ID='$idhd'";
	$result =db_get_row($sql);
	echo '<tr>';
	echo '<th>Số tiền </th>';
	echo '<td>'. $result['sum'].' VND </td>';
	echo '</tr>';
	
	
 ?>