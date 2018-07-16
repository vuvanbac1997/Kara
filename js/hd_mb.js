$("#idhd").change(function(){
	$.ajax({
		url: '../controller/mb_get_list_sp_hd_by_khID.php?hoadon_ID='+$('#idhd').val(),
		type: 'GET',
		success: function(result){
			$('#bhdmb').html(result);
			$('#loading').fadeOut(500);
	   }
	}); 

});
