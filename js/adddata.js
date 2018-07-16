$(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 1;
	var id = 1;
	var tong=0;
    $('#addRow').on( 'click', function () {
		var tensp = document.getElementById("tensp").value;
		var slsp = document.getElementById("slsp").value;
		var giasp = document.getElementById("giasp").value;
		tong += giasp*slsp;
        t.row.add( [id,tensp,slsp,giasp*slsp] ).draw( false );
		$.ajax({
				url: '../controller/insert.php',
				type: 'POST',
				data: $('#form1').serialize(),
				success: function(result){
					 $('#response').remove();
					 $('#container').append('<p id = "response">' + result + '</p>');
					 $('#loading').fadeOut(500);
				   }

		}); ;
        counter++;
		id++;
		
    } );
	$('#addSum').on( 'click', function () {
		t.row( $(this).parents('Tong') ).remove().draw();
        t.row.add( ["Tổng","","", tong] ).draw( true );	
		
    } );
	$('#load').on( 'click', function () {

		$('#container').append('<img src = "../ajax/ajax-loader.gif" alt="Currently loading" id = "loading" />');
		$.ajax({
				url: '../controller/insert_hd.php',
				type: 'POST',
				data: $('#form1').serialize(),
				success: function(result){
					 $('#response').remove();
					 $('#container').append('<p id = "response">' + result + '</p>');
					 $('#loading').fadeOut(500);
				   }

		});         

    });
} );