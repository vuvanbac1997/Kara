<?php require_once('../model/khaibao.php');?>
<?php
	$idhd = $_GET['idhd'];	
	$idsp = $_GET['idsp'];
	$slsp = $_GET['slsp'];
	$giasp = $_GET['giasp'];
	$sql = "UPDATE `hoadon_sanpham` SET gia_san_pham='$giasp',so_luong='$slsp' WHERE hoadon_ID='$idhd' AND sanpham_ID='$idsp'";
	mysqli_query($conn, $sql);
	
?>