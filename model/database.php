<?PHP
	$conn = null;
	function db_connect(){
		global $conn;
		if(!$conn){
			$conn = mysqli_connect("localhost", "root", "", "hoa_don");
		}
	}
	
	function db_close(){
		global $conn;
		if($conn){
			mysqli_close($conn);
		}
	}
	function db_get_list($sql){
		db_connect();
		$data = array();
		global $conn;
		$result = mysqli_query($conn, $sql);
		while( $row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}
	
	function db_get_row($sql){
		db_connect();
		global $conn;
		$row = array();
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}
		return $row;
	}
	function db_user_get_by_username($username, $password){
		db_connect();
	    $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
	    $sql = "SELECT * FROM admin WHERE ten_dang_nhap='$username' and mat_khau='$password'";
	    return db_get_row($sql);
	}
	//Ham xoa, them, sua database
	function db_execute($sql){
		db_connect();
		global $conn;
		$result = mysqli_query($conn, $sql);
		return $result;
	}
?>