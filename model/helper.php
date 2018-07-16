<?php
	//Ham tao url
	function base_url($temp){
		return 'http://localhost/baitapMVC/'.$temp;
	}
	function redirect($temp){
		
		header('Location:{$temp}');
		
	}
	//Ham lay gia tri tu POST
	function input_post($temp){
		return isset($_POST[$temp]) ? trim($_POST[$temp]) : false;
	}
	//Ham lay gia tri tu GET
	function input_get($temp){
		return isset($_GET[$temp]) ? trim($_GET[$temp]) : false;
	}
	//Ham kiem tra submit
	function is_submit($temp){
		return (isset($_POST['request_name']) && $_POST['request_name'] == $temp);
	}
	//Ham hien ra loi
	function show_error($error, $key){
		echo '<span style = "color:red">'.(empty($error[$key]) ? "" : $error[$key]).'</span>';
	}
?>