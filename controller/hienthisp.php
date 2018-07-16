<?php 
	if(isset($_POST['sx'])){
		$idkh = $_POST['tenkh'];
		$idhd = $_POST['idhd'];
		$_SESSION['idhdcx']=$idhd;
		$sql="SELECT * FROM hoadon_sanpham WHERE hoadon_ID='$idhd'"; 
		$result = db_get_list($sql);
		echo "<table id='bsp' name='bsp' style='text-align: center;' class='table table-striped table-bordered table-hover'><tr><td>ID</td><td>Sản phẩm</td><td>Số lượng</td><td>Giá</td><td>Sửa</td><td>Xóa</td></tr>";
		$demid=0;
		echo $_POST['idhd'];
		for($i = 0; $i < count($result); $i++){
			$demid++;
			$id = htmlentities($result[$i]['sanpham_ID']) ;
			$sl = htmlentities($result[$i]['so_luong']) ;
			$gia = htmlentities($result[$i]['gia_san_pham']) ;
			$_SESSION['idspcx']=$id;
			$_SESSION['slspcs']=$sl;
			$_SESSION['giaspcs']=$gia;
			echo "<tr>
					<td name='".$id."' id='".$id."' >$demid</td>
					<td data-id1='".$id."'>$id</td>
					<td data-id2='".$sl."'>$sl</td>
					<td data-id3='".$gia."'>$gia</td>
					<td><button class='btn btn-primary btn-circle edit'><i class='fa fa-link'></i></button></td>
					<td><a href='../controller/xoasp.php?idhd=".$idhd."&idsp=".$id."'><button type='button' class='btn btn-warning btn-circle'><i class='fa fa-times'></i></a></td>
				</tr>";
		}
	}
?>