<?php  	   
 $connect = mysqli_connect("localhost", "root", "", "hoa_don");  
 $output = ''; 
 echo $_POST['tenkh']; 
 $sql = "SELECT * FROM hoadon_sanpham ORDER BY sanpham_ID DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
	  <div class="table-responsive">  
		   <table class="table table-bordered">  
				<tr>  
					 <th width="10%">Id</th>  
					 <th width="40%">Tên sản phẩm</th>  
					 <th width="40%">Số lượng</th>  
					 <th width="40%">Giá</th> 
					 <th width="10%">Delete</th>  
				</tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM tbl_sample LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
	  while($row = mysqli_fetch_array($result))  
	  {  
		   $output .= '  
			<tr>  
				 <td>'.$row["hoadon_ID"].'</td>  
				 <td class="first_name" data-id1="'.$row["hoadon_ID"].'" contenteditable>'.$row["hoadon_ID"].'</td>  
				 <td class="last_name" data-id2="'.$row["sanpham_ID"].'" contenteditable>'.$row["sanpham_ID"].'</td>
				 <td class="last_name" data-id2="'.$row["gia_san_pham"].'" contenteditable>'.$row["gia_san_pham"].'</td> 				 
				 <td><button type="button" name="delete_btn" data-id3="'.$row["hoadon_ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
			</tr>  
		   ';  
	  }  
	  $output .= '  
		   <tr>  
				<td></td>  
				<td id="first_name" contenteditable></td>  
				<td id="last_name" contenteditable></td> 
				<td id="last_name" contenteditable></td> 
				<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
		   </tr>  
	  ';  
 }  
 else  
 {  
	  $output .= '
				<tr>  
					<td></td>  
					<td id="first_name" contenteditable></td>  
					<td id="last_name" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
	  </div>';  
 echo $output;  
 
?>