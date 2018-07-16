<?php require_once('../model/khaibao.php');?>
<?php
	$kh = $_POST['tenkh'];

	//id hoa don
	$sql = "SELECT * FROM hoadon";
	$result = db_get_list($sql);
	$demid= count($result);
	//id sp
	$sql = "SELECT khachhang_ID FROM khachhang WHERE ho_ten='$kh'";
	$result = db_get_row($sql);
	//echo $result['sanpham_ID'];
	$idkh = $result['khachhang_ID'];
	//echo $idkh;
	//kiểm tra
	$demid++;
	$sql = "INSERT INTO hoadon(hoadon_ID, khachhang_ID) VALUES('$demid','$idkh')";  
	mysqli_query($conn, $sql);
 ?>