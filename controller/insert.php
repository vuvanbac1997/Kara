<?php require_once('../model/khaibao.php');?>
<?php
	$kh = $_POST['tenkh'];
	$sp= $_POST['tensp'];
	$gia= $_POST['giasp'];
	$sl = $_POST['slsp'];
	
	//id hoa don
	$sql = "SELECT * FROM hoadon";
	$result = db_get_list($sql);
	$demid= count($result);
	
	//id sp
	$sql = "SELECT sanpham_ID FROM sanpham WHERE ten_san_pham='$sp'";
	$result = db_get_row($sql);
	
	//echo $result['sanpham_ID'];
	$idsp = $result['sanpham_ID'];
	//echo " Khách hàng: ".$kh .". Sản phẩm ". $sp .". Giá ". $gia .". Số lượng: ". $sl ." ID_HD: ". $demid;
	$sql = "INSERT INTO `hoadon_sanpham`(`hoadon_ID`, `sanpham_ID`, `gia_san_pham`, `so_luong`) VALUES ($demid,$idsp,$gia,$sl)";
	if (mysqli_query($conn, $sql)) {
		echo "Thêm thành công";
	} else{
		echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
	}
	//kiểm tra
	
//$sql = "INSERT INTO hoadon_san_pham(hoadon_ID, sanpham_ID, gia_san_pham) VALUES('$kh')";  
//mysqli_query($conn, $sql);
 ?>