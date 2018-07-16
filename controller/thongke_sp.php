<?php
$demid=1; 
$sql="SELECT * FROM sanpham"; 
$result = db_get_list($sql);
for ($i=0; $i<count($result); $i++){

	$idsp = $result[$i]['sanpham_ID'];
	$tensp = $result[$i]['ten_san_pham'];
	
	$slsp=0;
	$giasp=0;

	$sql1="SELECT SUM(sanpham_ID) AS sum FROM hoadon_sanpham WHERE sanpham_ID='$idsp'"; 
	$result1 = db_get_row($sql1);
	$slsp += $result1['sum'];

	$sql1="SELECT SUM(gia_san_pham) AS sum FROM hoadon_sanpham WHERE sanpham_ID='$idsp'"; 
	$result1 = db_get_row($sql1);
	$giasp += $result1['sum'];
	echo "
		<tr>
			<td>$demid</td>
			<td>$tensp</td>
			<td>$slsp</td>

			<td>$giasp</td>
		</tr>
	";
	$demid++;
}
?>