<?php require_once('../model/khaibao.php');?>
<?php
	$idhd = $_GET["idhd"];
	$idsp = $_GET['idsp'];
	$sql="DELETE FROM `hoadon_sanpham` WHERE sanpham_ID='$idsp' and hoadon_ID='$idhd'";
	mysqli_query($conn, $sql);
?>