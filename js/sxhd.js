$("#tenkh").change(function(){
	$.ajax({
		url: '../controller/get_list_hd_by_khID.php?khachhang_ID='+$('#tenkh').val(),
		type: 'GET',
		success: function(result){
			$('#response').remove();
			$('#idhd').html(result);
			$('#loading').fadeOut(500);
	   }
	}); 

});
$("#idhd").change(function(){
	$.ajax({
		url: '../controller/get_list_sp_hd_by_khID.php?hoadon_ID='+$('#idhd').val(),
		type: 'GET',
		success: function(result){
			$('#bhd').html(result);
			$('#loading').fadeOut(500);
	   }
	}); 

});
$("#idhd").change(function(){
	$.ajax({
		url: '../controller/get_list_sp_hd_xoa_by_khID.php?hoadon_ID='+$('#idhd').val(),
		type: 'GET',
		success: function(result){
			$('#xsp').html(result);
			$('#loading').fadeOut(500);
	   }
	}); 
});
$("#bhd").on('click', '.delete', function () {
	var tr = $(this).closest('tr'),
		del_id = $(this).attr('id');
		//del_id la id san pham lay tu button trong bang get list sp hd
	//alert(del_id+'  '+ $('#idhd').val());
	$.ajax({
		url: '../controller/xoasp.php?idhd='+ $('#idhd').val() + '&idsp=' + del_id,
		type: 'GET',
		success:function(result){
			tr.fadeOut(500, function(){
				$(this).remove();
			});
		}
	});
	
	//$(this).closest('tr').find("td:first").html()
    //$(this).closest('tr').remove();
});
$("#bhd").on('click', '.edit', function () {
	var tr = $(this).closest('tr'),
		edit_id = $(this).attr('id');
		//edit_id: id cua san pham can sua
	document.getElementById(edit_id).style.display="none";
	document.getElementById('save'+edit_id).style.display="block";
	
	var tensp = document.getElementById("ten"+edit_id);
	var slsp = document.getElementById("sl"+edit_id);
	var giasp = document.getElementById("gia"+edit_id);
	
	var tensp_data = tensp.innerHTML;
	var slsp_data = slsp.innerHTML;
	var giasp_data = giasp.innerHTML;
	
	//tensp.innerHTML="<input type='text' id='name_text"+edit_id+"' value='"+tensp_data+"'>";
	slsp.innerHTML="<input type='text' id='slsp_text"+edit_id+"' value='"+slsp_data+"'>";
	giasp.innerHTML="<input type='text' id='giasp_text"+edit_id+"' value='"+giasp_data+"'>";
});
$("#bhd").on('click', '.save', function () {
	var tr = $(this).closest('tr'),
		save_id = $(this).attr('name');
		//save_id: id cua san pham can luu
	//	alert(save_id);
	//var tensp_val=document.getElementById("name_text"+no).value;
	var slsp_val=document.getElementById("slsp_text"+save_id).value;
	var giasp_val=document.getElementById("giasp_text"+save_id).value;
	
	// hiển thị lại giá trị
	//document.getElementById("name_row"+no).innerHTML=name_val;
	document.getElementById("sl"+save_id).innerHTML=slsp_val;
	document.getElementById("gia"+save_id).innerHTML=giasp_val;
	
	// hiện và ẩn nút
	document.getElementById(save_id).style.display="block";
	document.getElementById('save'+save_id).style.display="none";
	
	//lưu vào csdl
	$.ajax({
		url: '../controller/suasp.php',
		type: 'GET',
		data : { 
            idhd : $('#idhd').val(),
			idsp : save_id,
			slsp : slsp_val,
			giasp : giasp_val
		},
		
	});
});
