<?php
$demid=1; 
$sql="SELECT * FROM khachhang"; 
$result = db_get_list($sql);
for ($i=0; $i<count($result); $i++){

	$idkh = $result[$i]['khachhang_ID'];
	$tenkh = $result[$i]['ho_ten'];
	$slhd=0;

	$sql1="SELECT * FROM hoadon  WHERE khachhang_ID='$idkh'"; 
		$result1 = db_get_list($sql1);
		$tien=0;
		$sl=0;
		for ($j=0; $j<count($result1); $j++){
			$idhd = $result1[$j]['hoadon_ID'];
			
			$sql2="SELECT SUM(gia_san_pham) AS sum FROM hoadon_sanpham WHERE hoadon_ID='$idhd'"; 
			$result2 = db_get_row($sql2);
			$tien = $result2['sum'];
			
			$sql2="SELECT SUM(so_luong) AS sum FROM hoadon_sanpham WHERE hoadon_ID='$idhd'"; 
			$result2 = db_get_row($sql2);
			$sl = $result2['sum'];
		}
	echo "
		<tr>
			<td>$demid</td>
			<td>$tenkh</td>
			<td>$tien</td>
			<td>$sl</td>
		</tr>
	";
	$demid++;
}
?>