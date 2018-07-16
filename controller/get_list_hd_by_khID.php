<?php require_once('../model/khaibao.php');?>
<?php
	$kh_ID = $_GET['khachhang_ID'];
	//id hoa don
	$sql = "SELECT * FROM hoadon WHERE khachhang_ID='$kh_ID'";
	$result = db_get_list($sql);
	foreach($result as $hd){
		echo '<option value="'.$hd['hoadon_ID'].'">Hóa đơn '.$hd['hoadon_ID'].'</option>';
	}
	echo '<option disabled="disabled" selected="selected">Chọn</option>';
?>