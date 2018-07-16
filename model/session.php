<?php
	// Gán session (SET)
	session_start();
	function session_set($key, $val){
    	$_SESSION[$key] = $val;
	}
 
// Lấy session (GET)
	function session_get($key){
    	return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
	}
 
// Xóa session (DELETE)
	function session_delete($key){
    	if (isset($_SESSION[$key])){
        	unset($_SESSION[$key]);
    	}
	}
	function session_rm(){
    	if (isset($_SESSION[$key])){
        	session_destroy();
    	}
	}
	$error = array();
?>