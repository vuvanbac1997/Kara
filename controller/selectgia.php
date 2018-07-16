<?php  
$connect = mysqli_connect("localhost", "root", "", "hoa_don");
$sql = "SELECT gia_san_pham FROM sanpham ";  
$result  = ($connect, $sql);
$data= array();
while ($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}
echo json_encode($data)
 ?>