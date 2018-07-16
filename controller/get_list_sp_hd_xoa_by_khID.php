<?php require_once('../model/khaibao.php');?>
<?php
	$hd_ID = $_GET['hoadon_ID'];
	//id hoa don
	$sql = "SELECT * FROM hoadon_sanpham WHERE hoadon_ID='$hd_ID'";
	$result = db_get_list($sql);
	foreach($result as $hd){
		echo '<option value="'.$hd['sanpham_ID'].'">Sản phẩm '.$hd['sanpham_ID'].'</option>';
	}
	echo '<option disabled="disabled" selected="selected">Chọn</option>';
	
?>